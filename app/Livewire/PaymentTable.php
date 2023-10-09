<?php

namespace App\Livewire;

use App\Models\Payment;
use App\Models\Property;
use App\Models\Statement;
use App\Models\Tenant;
use App\Models\Unit;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use App\Services\InvoiceReceiptAutoAllocation;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;

class PaymentTable extends Component implements HasForms, HasTable
{

    use InteractsWithTable, InteractsWithForms;

    public $record;

    public function table(Table $table): Table
    {
        return $table
            ->query(Payment::where('tenant_name', $this->record->full_names)->latest())->poll('2s')
            ->columns([
                TextColumn::make('paid_date')->date()->size('sm')->searchable()->sortable(),
                TextColumn::make('receipt_number')->size('sm')->searchable()->sortable(),
                TextColumn::make('reference_number')->size('sm')->searchable()->sortable(),
                TextColumn::make('mode_of_payment')->size('sm')->label('Payment')->sortable()->searchable(),
                TextColumn::make('amount')->size('sm')->money('kes')->summarize(Sum::make()->label('Total Payments')->money('kes'))->money('kes'),
                TextColumn::make('status')->badge()->color(fn (string $state): string => match ($state) {
                    'unallocated' => 'success',
                    'fully allocated' => 'gray',
                    'partially allocated' => 'warning'
                }),
                TextColumn::make('balance')->size('sm')->sortable()->money('kes')->summarize(Sum::make()->label('Total Balance')->money('kes'))->money('kes'),
            ])
            ->filters([
                // ...
            ])->headerActions([
                CreateAction::make()->label('Add a payment')
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
                            DatePicker::make('paid_date')->required()->maxDate(now())
                        ])->columns(3)
                    ])->action(function (array $data) {
                        $total_debit = Statement::where('tenant_name', $this->record->full_names)->sum('debit');
                        $total_credit = Statement::where('tenant_name', $this->record->full_names)->sum('credit');
                        $reference_number = $data['model_of_payment'] == 'Cash' ? 'cash payment' : $data['reference_number'];
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
                                'description' => $data['mode_of_payment'] . "# " . $data['reference_number'],
                                'reference' => $receipt->receipt_number,
                                'credit' => $receipt->balance,
                                'debit' => 0,
                                'balance' => $total_debit - ($total_credit + $receipt->balance),
                                'cummulative_balance' => $total_debit - ($total_credit + $receipt->balance)
                            ];

                            $statement = Statement::create($statement_data);

                            InvoiceReceiptAutoAllocation::handleNewReceipt($this->record, $receipt, $statement);

                            Notification::make()->success()->color('success')->body("Payment added successfully !")->send();
                        } else {
                            Notification::make()->warning()->color('warning')->body('Unable to add payment !')->send();
                        }
                    }),
                ExportAction::make()->label('Export CSV')->color('gray')->exports(
                    [ExcelExport::make('table')->fromTable()->askForFileName()],
                )
            ])
            ->actions([
                // ...
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
