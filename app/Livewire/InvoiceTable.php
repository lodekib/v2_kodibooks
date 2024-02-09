<?php

namespace App\Livewire;

use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use App\Models\ActiveUtility;
use App\Models\Invoice;
use App\Models\Statement;
use App\Models\Utility;
use App\Models\Waterbill;
use App\Services\InvoiceReceiptAutoAllocation;
use App\Services\InvoiceTenant;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

class InvoiceTable extends Component implements HasForms, HasTable
{

    use InteractsWithTable, InteractsWithForms;
    public $record;

    public function table(Table $table): Table
    {
        return $table
            ->query(Invoice::where('tenant_name', $this->record->full_names)->latest())->poll('2s')
            ->columns([
                TextColumn::make('No')->rowIndex(),
                TextColumn::make('due_date')->datetime()->size('sm'),
                TextColumn::make('property_name')->size('sm')->searchable()->sortable(),
                TextColumn::make('unit_name')->size('sm')->sortable()->searchable(),
                TextColumn::make('invoice_number')->size('sm')->searchable()->sortable(),
                TextColumn::make('invoice_type')->size('sm')->searchable()->sortable(),
                TextColumn::make('invoice_status')->badge()->color(fn (string $state): string => match ($state) {
                    'pending' => 'warning',
                    'partially paid' => 'gray',
                    'fully paid' => 'success'
                })->searchable()->sortable(),
                TextColumn::make('amount_invoiced')->size('sm')->money('kes')->summarize(Sum::make()->label('Total Invoiced')->money('kes')),
                TextColumn::make('balance')->size('sm')->money('kes')
            ])
            ->filters([
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('start_date'),
                        DatePicker::make('end_date'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['start_date'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['end_date'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
            ])
            ->headerActions([
                CreateAction::make()->label('Invoice tenant')->icon('heroicon-o-plus-circle')->action(function (array $data): void {
                    $invoice_number = strtoupper(substr($this->record->property_name, 0, 3)) . "-" . time();

                    if ($data['invoice_type'] == 'Water') {
                        $tenant_water = Waterbill::where('property_name', $this->record->property_name)
                            ->where('unit_name', $this->record->unit_name)
                            ->where('tenant_name', $this->record->full_names)->get();

                        $quantity = $tenant_water->first()->current_reading - $tenant_water->first()->previous_reading;
                        $get_amount = Utility::where('property_name', $this->record->property_name)->where('utility_name', 'Water')->get('amount');
                        $amount = $get_amount->first()->amount;
                    } else if ($data['invoice_type'] == 'Standard') {
                        $amount = $data['amount_invoiced'];
                        $quantity = 1;
                    } else if ($data['invoice_type'] == 'Rent') {
                        $amount = $this->record->balance;
                        $quantity = 1;
                    } else {
                        $value  = Utility::where('property_name', $this->record->property_name)
                            ->where('utility_name', $data['invoice_type'])->get('amount');
                        $amount =  $value->first()->amount;
                        $quantity = 1;
                    }
                    $new_data = array_merge(
                        $data,
                        [
                            'invoice_number' => $invoice_number,
                            'amount' => $amount,
                            'quantity' => $quantity
                        ]
                    );
                    InvoiceTenant::invoiceTenant($this->record, $new_data);

                    $final_invoice_data = [
                        'tenant_id' => $this->record->id,
                        'national_id' => $this->record->id_number,
                        'invoice_number' => $invoice_number,
                        'invoice_type' => $data['invoice_type'],
                        'due_date' => $data['due_date'],
                        'from' => $data['from'],
                        'to' => $data['to'],
                        'tenant_name' => $this->record->full_names,
                        'property_name' => $this->record->property_name,
                        'unit_name' => $this->record->unit_name,
                        'invoice_description' => $data['invoice_details'],
                        'amount_invoiced' => $data['amount_invoiced'],
                        'invoice_status' => 'pending',
                        'balance' => $data['amount_invoiced']
                    ];

                    $final_invoice = Invoice::create($final_invoice_data);
                    //check for auto invoicing 
                    if ($final_invoice) {
                        //TODO::OPTIMIZATION NEEDED
                        $total_debit = Statement::where('tenant_name', $this->record->full_names)->sum('debit');
                        $total_credit = Statement::where('tenant_name', $this->record->full_names)->sum('credit');

                        $statement_data = [
                            'tenant_id' => $this->record->id,
                            'tenant_name' => $this->record->full_names,
                            'description' => $data['invoice_type'] . " invoice",
                            'reference' => $final_invoice->invoice_number,
                            'debit' => $final_invoice->balance,
                            'credit' => 0,
                            'balance' => $total_debit - ($total_credit - $final_invoice->balance),
                            'cummulative_balance' => $total_debit - ($total_credit - $final_invoice->balance),
                            's_balance' => $total_debit - ($total_credit - $final_invoice->balance),

                        ];

                        Statement::create($statement_data);
                        //Allocation has been done, then save the statement
                        InvoiceReceiptAutoAllocation::handleNewInvoice($final_invoice);
                        $bal = Statement::where('tenant_name', $this->record->full_names)->selectRaw('SUM(debit) - SUM(credit) as balance')->first()->balance;
                        $this->record->update(['balance' => $bal]);
                    }
                })->form([
                    Section::make()->schema([
                        Radio::make('invoice_type')->options(function () {
                            $utils = [];
                            $utilities = ActiveUtility::where('tenant_name', $this->record->full_names)->pluck('active_utilities');

                            if ($utilities->isNotEmpty()) {
                                foreach ($utilities[0] as $value) {
                                    $utils[$value] = $value;
                                }
                                return array_merge($utils, ['Standard' => 'Standard', 'Rent' => 'Rent']);
                            } else {
                                return [
                                    'Standard' => 'Standard',
                                    'Rent' => 'Rent'
                                ];
                            }
                        })->inline()->required()->reactive()->afterStateUpdated(function ($state, Set $set) {
                            if ($state !== null) {
                                if ($state == 'Water') {
                                    $tenant_water = Waterbill::where('property_name', $this->record->property_name)
                                        ->where('unit_name', $this->record->unit_name)
                                        ->where('tenant_name', $this->record->full_names)->latest()->get(['current_reading', 'previous_reading']);
                                    if ($tenant_water->first() != null) {
                                        $quantity = $tenant_water->first()->current_reading - $tenant_water->first()->previous_reading;
                                        $get_amount = Utility::where('property_name', $this->record->property_name)->where('utility_name', 'Water')->pluck('amount');
                                        $set('amount_invoiced', $get_amount[0] * $quantity);
                                    } else {
                                        Notification::make()->body('Please add water reading before invoicing')->warning()
                                            ->color('warning')->persistent()->actions([
                                                Action::make('Add reading')->color('gray')->button()
                                            ])->send();
                                    }
                                } else if ($state == 'Standard') {
                                    $set('amount_invoiced', '');
                                } else if ($state == 'Rent') {
                                    $set('amount_invoiced', $this->record->rent);
                                } else {
                                    $value  = Utility::where('property_name', $this->record->property_name)
                                        ->where('utility_name', $state)->get();
                                    $set('amount_invoiced', $value->first()->amount);
                                }
                            }
                            $set('invoice_title', $state . " Invoice");
                        })
                    ]),
                    Fieldset::make(fn ($get) => $get('invoice_type') . " Invoice")->schema([
                        TextInput::make('invoice_title')->required()->disabled()->dehydrated(),
                        DatePicker::make('due_date')->required(),
                        TextInput::make('amount_invoiced')->label('Amount ( Ksh )')->required(),
                        DatePicker::make('from')->required(),
                        DatePicker::make('to')->required(),
                        Textarea::make('invoice_details')->label('Note to tenant')->rows(2)->required()
                    ])->visible(fn (Get $get) => $get('invoice_type') !== null ? true : false)
                ]),
                ExportAction::make()->outlined()->label('Excel')->color('gray')->exports([ExcelExport::make('table')->fromTable()->withFilename(date('Y-m-d') . ' - export')->except(['No'])])
                // FilamentExportHeaderAction::make('Reports')->color('gray')->icon('heroicon-o-clipboard-document')->disableAdditionalColumns()
            ])
            ->actions([
                ActionGroup::make([
                    DeleteAction::make()->action(function ($record) {
                        optional($record->statement)->delete();
                        $record->update(['invoice_status' => 'stale/' . $record->invoice_status]);
                        Notification::make()->color('primary')->success()->title('Success !')->body('Invoice deleted successfully .')->send();
                    })
                ])
            ])
            ->bulkActions([
                // ...
            ]);
    }
    public function render()
    {
        return view('livewire.invoice-table');
    }
}
