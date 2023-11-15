<?php

namespace App\Livewire;

use App\Models\ActiveUtility;
use App\Models\Invoice;
use App\Models\Property;
use App\Models\Statement;
use App\Models\Tenant;
use App\Models\Unit;
use App\Models\Utility;
use App\Models\Waterbill;
use App\Services\InvoiceReceiptAutoAllocation;
use App\Services\InvoiceTenant;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;

class WaterBillComponent extends Component implements HasForms, HasTable
{
    use InteractsWithForms, InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table->query(Invoice::query()->where('invoice_type', 'Water'))
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
            ])->headerActions([
                CreateAction::make()->label('Add Waterbill')->outlined()->action(function (array $data): void {
                    $invoice_number = strtoupper(substr($data['property_name'], 0, 3)) . "-" . time();
                    $tenant = Tenant::where('full_names', $data['tenant_name'])->first();
                    $tenant_water = Waterbill::where('property_name', $data['property_name'])
                        ->where('unit_name', $data['unit_name'])
                        ->where('tenant_name', $data['tenant_name'])->get();
                    $quantity = $tenant_water->first()->current_reading - $tenant_water->first()->previous_reading;
                    $get_amount = Utility::where('property_name', $data['property_name'])->where('utility_name', 'Water')->get('amount');
                    $amount = $get_amount->first()->amount;
                    $total_amount = $amount * $quantity;
                    $new_data = array_merge(
                        $data,
                        [
                            'invoice_number' => $invoice_number,
                            'amount' => $amount,
                            'quantity' => $quantity,
                            'invoice_title' =>'Water',
                            'invoice_details' => 'Water invoice',
                            'invoice_type' =>'Water'
                        ]
                    );

                    InvoiceTenant::invoiceTenant($tenant, $new_data);

                    $final_invoice_data = [
                        'tenant_id' => $tenant->id,
                        'national_id' => $tenant->id_number,
                        'invoice_number' => $invoice_number,
                        'invoice_type' => $new_data['invoice_type'],
                        'due_date' => $new_data['due_date'],
                        'from' => $new_data['from'],
                        'to' => $new_data['to'],
                        'tenant_name' => $tenant->full_names,
                        'property_name' => $tenant->property_name,
                        'unit_name' => $tenant->unit_name,
                        'invoice_description' => 'Water',
                        'amount_invoiced' => $total_amount,
                        'invoice_status' => 'pending',
                        'balance' => $total_amount
                    ];

                    $final_invoice = Invoice::create($final_invoice_data);
                    //check for auto invoicing 
                    if ($final_invoice) {
                        //TODO::OPTIMIZATION NEEDED
                        $total_debit = Statement::where('tenant_name', $tenant->full_names)->sum('debit');
                        $total_credit = Statement::where('tenant_name', $tenant->full_names)->sum('credit');

                        $statement_data = [
                            'tenant_id' => $tenant->id,
                            'tenant_name' => $tenant->full_names,
                            'description' => $new_data['invoice_type'] . " invoice",
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
                    }
                })->form([
                    Section::make()->schema([
                        Select::make('tenant_name')->options(fn () =>  ActiveUtility::whereJsonContains('active_utilities', 'Water')->pluck('tenant_name', 'tenant_name'))->required()->reactive(),
                        Select::make('unit_name')->options(function (Get $get) {
                            if ($get('tenant_name') != null) {
                                $tenant_id = Tenant::where('full_names', $get('tenant_name'))->pluck('id');
                                return Unit::where('tenant_id', $tenant_id)->pluck('unit_name', 'unit_name');
                            } else {
                                return [];
                            }
                        })->required()->reactive()->afterStateUpdated(function ($state, Set $set) {
                            $property = Unit::where('unit_name', $state)->pluck('property_name');
                            ($property);
                            $set('property_name', $property[0]);
                        }),
                        TextInput::make('property_name')->disabled()->dehydrated()->required(),
                        DatePicker::make('due_date')->required(),
                        DatePicker::make('from')->required(),
                        DatePicker::make('to')->required()

                    ])->columns(3)
                ])
            ]);
    }
    public function render()
    {
        return view('livewire.water-bill-component');
    }
}
