<?php

namespace App\Filament\Manager\Pages;

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
use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class WaterbillPage extends Page implements HasForms, HasTable
{

    use InteractsWithForms, InteractsWithTable;
    // protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Utilities';
    protected static string $view = 'filament.manager.pages.waterbill-page';
    protected static ?string $navigationLabel = 'Water bills';


    public function table(Table $table): Table
    {
        return $table->query(Waterbill::query())
            ->columns([
                TextColumn::make('date_added')->label('Date')->size('sm'),
                TextColumn::make('tenant_name')->label('Tenant')->size('sm')->searchable()->sortable(),
                TextColumn::make('property_name')->label('Property')->size('sm')->sortable()->searchable(),
                TextColumn::make('unit_name')->label('Unit')->size('sm')->sortable()->searchable(),
                TextColumn::make('previous_reading')->label('Prev (m3)')->size('sm')->formatStateUsing(fn ($state) => number_format($state, 2)),
                TextColumn::make('current_reading')->label('Curr (m3)')->size('sm')->formatStateUsing(fn ($state) => number_format($state, 2)),
                TextColumn::make('updated_at')->label('Rate')->formatStateUsing(function ($record) {
                    $amount = Utility::where('property_name', $record->property_name)->where('utility_name','LIKE','%water%')->pluck('amount');
                    return 'KES ' . number_format($amount[0], 2);
                }),
                TextColumn::make('id')->label('Total')->formatStateUsing(function ($record) {
                    $amount = Utility::where('property_name', $record->property_name)->where('utility_name','LIKE', '%water%')->pluck('amount');
                    $quantity  = $record->current_reading - $record->previous_reading;
                    return 'KES ' . number_format($amount[0] * $quantity, 2);
                }),
            ])->actions([
                ActionGroup::make([
                    DeleteAction::make()
                ])
            ])
            ->headerActions([
                CreateAction::make()->label('Add Reading')->outlined()->action(function (array $data) {
                    $tenant = Tenant::where('full_names', $data['tenant_name'])->where('unit_name', $data['unit_name'])->first();
                    $the_new_data = [
                        'tenant_id' => $tenant->id,
                        'tenant_name' => $data['tenant_name'],
                        'property_name' => $tenant->property_name,
                        'unit_name' => $data['unit_name'],
                        'previous_reading' => $data['previous_reading'],
                        'current_reading' => $data['current_reading'],
                        'date_added' => $data['date_added']

                    ];
                    if (Waterbill::create($the_new_data)) {
                        $invoice_number = strtoupper(substr($tenant->property_name, 0, 3)) . "-" . time();
                        $tenant_water = Waterbill::where('property_name', $tenant->property_name)
                            ->where('unit_name', $data['unit_name'])
                            ->where('tenant_name', $data['tenant_name'])->get();
                        $quantity = $tenant_water->first()->current_reading - $tenant_water->first()->previous_reading;
                        $get_amount = Utility::where('property_name', $tenant->property_name)->where('utility_name','LIKE', '%water%')->get('amount');
                        $amount = $get_amount->first()->amount;
                        $total_amount = $amount * $quantity;
                        $new_data = array_merge(
                            $data,
                            [
                                'invoice_number' => $invoice_number,
                                'amount' => $amount,
                                'quantity' => $quantity,
                                'invoice_title' => 'Water',
                                'invoice_details' => 'Water invoice',
                                'invoice_type' => 'Water',
                                'due_date' => $data['date_added'],
                                'from' => Carbon::parse($data['date_added'])->firstOfMonth(),
                                'to' => $data['date_added']
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
                        Notification::make()->success()->color('success')->body('Water bill added successfully !')->send();
                    } else {
                        Notification::make()->warning()->color('warning')->body('Unable to add water bill')->send();
                    }
                })->form([
                    Fieldset::make('')->schema(
                        [
                            Select::make('tenant_name')->options(fn () =>  ActiveUtility::whereJsonContains('active_utilities', 'Water')->orWhereJsonContains('active_utilities','water')->pluck('tenant_name', 'tenant_name'))->required()->reactive(),
                            Select::make('unit_name')->options(fn (Get $get) => $get('tenant_name') != null ? Tenant::where('full_names', $get('tenant_name'))->pluck('unit_name', 'unit_name') : [])->required()
                                ->afterStateUpdated(function ($state, Get $get, Set $set) {
                                    $tenant_name = $get('tenant_name');
                                    if ($tenant_name != null) {
                                        $tenant_exists = Waterbill::where('tenant_name', $tenant_name)
                                            ->where('unit_name', $state)->pluck('current_reading');
                                        if ($tenant_exists->isEmpty()) {
                                            $set('previous_reading', 0);
                                        } else {
                                            $set('previous_reading', $tenant_exists->first());
                                        }
                                    }
                                })->reactive(),
                            TextInput::make('previous_reading')->label('Previous reading ( m3 )')->disabled()->dehydrated()->default(function ($state, Get $get, Set $set) {
                                $tenant_name = $get('tenant_name');
                                $unit_name = $get('unit_name');
                                if ($tenant_name != null && $unit_name != null) {
                                    $tenant_exists = Waterbill::where('tenant_name', $tenant_name)
                                        ->where('unit_name', $unit_name)->pluck('current_reading');
                                    if ($tenant_exists->isEmpty()) {
                                        return 0;
                                    } else {
                                        return $tenant_exists->first();
                                    }
                                }
                            }),
                            TextInput::make('current_reading')->label('Current reading ( m3)')->required()->integer()->minValue(0),
                            DatePicker::make('date_added')->label('Date')->required()
                        ]
                    )->columns(3)
                ])
            ]);
    }
}
