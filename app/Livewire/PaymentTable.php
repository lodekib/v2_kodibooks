<?php

namespace App\Livewire;

use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use App\Models\Payment;
use App\Models\Property;
use App\Models\Statement;
use App\Models\Tenant;
use App\Models\Unit;
use App\Notifications\ReminderNotification;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use App\Services\InvoiceReceiptAutoAllocation;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Get;
use Filament\Forms\Set;
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

class PaymentTable extends Component implements HasForms, HasTable
{

    use InteractsWithTable, InteractsWithForms;

    public $record;

    public function table(Table $table): Table
    {
        return $table
            ->query(Payment::where('tenant_id', $this->record->id)->latest())->poll('2s')
            ->columns([
                TextColumn::make('No')->rowIndex(),
                TextColumn::make('paid_date')->datetime()->size('sm')->searchable(),
                TextColumn::make('tenant.id_number')->label('Account')->size('sm')->searchable()->sortable()->copyable(),
                TextColumn::make('receipt_number')->size('sm')->searchable()->sortable(),
                TextColumn::make('reference_number')->size('sm')->searchable()->sortable(),
                TextColumn::make('unit_name')->searchable()->sortable()->size('sm'),
                TextColumn::make('mode_of_payment')->size('sm')->label('Payment')->sortable()->searchable(),
                TextColumn::make('amount')->size('sm')->money('kes')->summarize(Sum::make()->label('Total Payments')->money('kes'))->money('kes'),
                TextColumn::make('status')->badge()->color(fn (string $state): string => match ($state) {
                    'unallocated' => 'success',
                    'fully allocated' => 'gray',
                    'partially allocated' => 'warning'
                }),
                TextColumn::make('balance')->size('sm')->sortable()->money('kes')->summarize(Sum::make()->label('Total Balance')->money('kes'))->money('kes')->toggleable(isToggledHiddenByDefault: true),
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
            ])->headerActions([
                CreateAction::make()->label('Add a payment')->icon('heroicon-o-plus-circle')
                    ->form([
                        Fieldset::make()->schema([
                            Select::make('unit_name')->options($this->record->units()->pluck('unit_name', 'unit_name'))->afterStateUpdated(function ($state, Set $set) {
                                $property = Unit::where('unit_name', $state)->pluck('property_name');
                                $set('property_name', $property[0]);
                            })->required()->reactive(),
                            TextInput::make('property_name')->disabled()->dehydrated(),
                            Select::make('mode_of_payment')->options([
                                'Cash' => 'Cash', 'Pesalink' => 'Pesalink', 'Cheque' => 'Cheque',
                                'Paypal' => 'Paypal', 'Agent' => 'Agent'
                            ])->required()->reactive(),
                            TextInput::make('amount')->prefix('Ksh')->required(),
                            TextInput::make('reference_number')->required()
                                ->visible(fn (Get $get) => $get('mode_of_payment') != null && $get('mode_of_payment') == 'Cash' ? false : true),
                            DateTimePicker::make('paid_date')->required()->maxDate(now())
                        ])->columns(3)
                    ])->action(
                        function (array $data) {
                            $total_debit = Statement::where('tenant_name', $this->record->full_names)->sum('debit');
                            $total_credit = Statement::where('tenant_name', $this->record->full_names)->sum('credit');
                            $reference_number = $data['mode_of_payment'] == 'Cash' ? 'cash payment' : $data['reference_number'];
                            $receipt_number = strtoupper(substr($data['property_name'], 0, 3)) . "-" . time();
                            $receipt_data = [
                                'tenant_id' => $this->record->id,
                                'tenant_name' => $this->record->full_names,
                                'national_id' => $this->record->id_number,
                                'property_name' => $data['property_name'],
                                'unit_name' => $data['unit_name'],
                                'reference_number' => $reference_number,
                                'receipt_number' => $receipt_number,
                                'mode_of_payment' => $data['mode_of_payment'],
                                'amount' => $data['amount'],
                                'balance' => $data['amount'],
                                'paid_date' => $data['paid_date'],
                                'status' => 'unallocated'
                            ];
                            $receipt = Payment::create($receipt_data);

                            if ($receipt) {
                                $statement_data = [
                                    'tenant_id' => $this->record->id,
                                    'tenant_name' => $this->record->full_names,
                                    'description' => $data['mode_of_payment'] . "# " . $reference_number,
                                    'reference' => $receipt->receipt_number,
                                    'credit' => $receipt->balance,
                                    'debit' => 0,
                                    'balance' => $total_debit - ($total_credit + $receipt->balance),
                                    'cummulative_balance' => $total_debit - ($total_credit + $receipt->balance),
                                    's_balance' => $total_debit - ($total_credit + $receipt->balance),

                                ];

                                $statement = Statement::create($statement_data);
                                InvoiceReceiptAutoAllocation::handleNewReceipt($this->record->full_names, $receipt, $statement);
                                $bal = Statement::where('tenant_name', $this->record->full_names)->selectRaw('SUM(debit) - SUM(credit) as balance')->first()->balance;
                                $this->record->update(['balance' => $bal]);
                                Notification::make()->success()->color('success')->body("Payment added successfully !")->send();
                            } else {
                                Notification::make()->warning()->color('warning')->body('Unable to add payment !')->send();
                            }
                        }
                    ),
                ExportAction::make()->outlined()->label('Excel')->color('gray')->exports([ExcelExport::make('table')->fromTable()->withFilename(date('Y-m-d') . ' - export')->except(['No'])])
                // FilamentExportHeaderAction::make('Reports')->color('gray')->icon('heroicon-o-clipboard-document')->disableAdditionalColumns()
            ])
            ->actions([
                ActionGroup::make([
                    DeleteAction::make()->action(function ($record) {
                        $record->update(['status' => 'stale/' . $record->status]);
                        Notification::make()->success()->color('success')->body('Payment deleted successfully !')->send();
                    })
                ])
            ])
            ->bulkActions([
                // ...
            ]);
    }



    public function render()
    {
        return view('livewire.payment-table');
    }
}
