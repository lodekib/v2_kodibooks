<?php

namespace App\Filament\Manager\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use App\Filament\Manager\Resources\TenantResource\Pages;
use App\Models\Property;
use App\Models\Tenant;
use App\Models\Unit;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\Split;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use App\Filament\Manager\Resources\TenantResource\RelationManagers;
use App\Mail\InvoiceSent;
use App\Models\ActiveUtility;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Statement;
use App\Models\Utility;
use App\Models\Waterbill;
use App\Services\InvoiceReceiptAutoAllocation;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Mail;
use App\Models\Mail as Mailconfig;
use App\Models\Scopes\ManagerScope;
use Filament\Forms\Components\Section;
use Filament\Infolists\Components\Section as InfoSection;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;


class TenantResource extends Resource
{
    protected static ?string $recordTitleAttribute = 'full_names';
    protected static ?string $model = Tenant::class;
    protected static ?string $navigationGroup = 'Assets';

    // protected static ?string $navigationIcon = 'heroicon-s-user-group';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('')->description('Personal & housing details.')->schema([
                    TextInput::make('full_names')->required(),
                    TextInput::make('email')->required()->unique(ignoreRecord: true)->email(),
                    TextInput::make('phone_number')->tel()->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')->unique(ignoreRecord: true)->required(),
                    TextInput::make('id_number')->required()->integer(),
                    Select::make('property_name')->options(Property::all()->pluck('property_name', 'property_name'))->required()->reactive()->hiddenOn('edit'),
                    Select::make('unit_name')->options(function (callable $get) {
                        return Unit::where('status', 'vacant')->where('property_name', $get('property_name'))->pluck('unit_name', 'unit_name');
                    })->required()->reactive()->afterStateUpdated(function ($set, $state) {
                        $unit = Unit::where('unit_name', $state)->get();
                        $set('rent', $unit->first()->rent);
                        $set('deposit', $unit->first()->deposit);
                    })->hiddenOn('edit'),
                ])->columns(3),
                Section::make('')->description('Payments & invoicing.')->schema([
                    TextInput::make('rent')->prefix('Ksh')->required()->integer()->minValue(10),
                    TextInput::make('deposit')->prefix('Ksh')->lte('rent')->required()->integer()->minValue(10),
                    TextInput::make('arrears')->prefix('Ksh')->required()->default(0)->integer(),
                    TextInput::make('surplus')->prefix('Ksh')->required()->default(0)->integer(),
                    DatePicker::make('entry_date')->required()
                ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('No')->rowIndex(),
                TextColumn::make('id_number')->size('sm')->searchable()->sortable()->copyable()->copyMessage('ID number copied'),
                TextColumn::make('phone_number')->size('sm')->searchable()->sortable()->copyable()->copyMessage('Phone number copied '),
                TextColumn::make('full_names')->size('sm')->searchable()->sortable(),
                TextColumn::make('email')->size('sm')->sortable()->searchable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('property_name')->size('sm')->searchable()->sortable(),
                TextColumn::make('units.unit_name')->size('sm')->searchable()->sortable()->badge()->color('gray')->inline()->separator(','),
                TextColumn::make('rent')->size('sm')->money('kes'),
                TextColumn::make('balance')->size('sm')->formatStateUsing(
                    fn ($record) =>
                    __('KES ' . number_format(Statement::where('tenant_name', $record->full_names)->selectRaw('SUM(debit) - SUM(credit) as balance')->first()->balance, 2, '.', ','))
                )->color(fn ($record) => Statement::where('tenant_name', $record->full_names)->selectRaw('SUM(debit) - SUM(credit) as balance')->first()->balance > 0 ? 'danger' : 'success'),
                TextColumn::make('entry_date')->size('sm')->date()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('status')->colors([
                    'success' => static fn ($state): bool => $state === 'active',
                    'warning' => static fn ($state): bool => $state === 'inactive',
                ])->badge()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->striped()
            ->filters([
                Filter::make('Arrears')->query(fn(Builder $query) :Builder => $query->where('balance','>',0) ),
                SelectFilter::make('Utility')->options(Utility::pluck('utility_name', 'utility_name'))->query(function (Builder $query, array $data): Builder {
                    $utility = $data['value'];
                    if ($utility != null) {
                        return $query->whereHas('activeutility', function (Builder $query) use ($utility) {
                            $query->whereJsonContains('active_utilities', $utility);
                        });
                    } else {
                        return Tenant::latest();
                    }
                })
            ])->headerActions([
                ExportAction::make()->outlined()->label('EXCEL')->color('gray')->exports([ExcelExport::make('table')->fromTable()->withFilename(date('Y-m-d') . ' - export')->askForWriterType()->except(['No'])]),
                FilamentExportHeaderAction::make('PDF')->label('PDF')->color('gray')->outlined()->disableAdditionalColumns()
                    ->disableCsv()->disableXlsx()->defaultFormat('pdf')->disableFilterColumns()->disablePreview()
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make()->label('View Tenant'),
                    Action::make('Add water bill')->icon('heroicon-o-funnel')
                        ->action(function (Tenant $record, array $data) {
                            $new_data = [
                                'tenant_id' => $record->id,
                                'tenant_name' => $record->full_names,
                                'property_name' => $record->property_name,
                                'unit_name' => $record->unit_name,
                                'previous_reading' => $data['previous_reading'],
                                'current_reading' => $data['current_reading'],
                                'date_added' => $data['date_added']

                            ];

                            if (Waterbill::create($new_data)) {
                                Notification::make()->success()->body('Water bill added successfully !')->send();
                            } else {
                                Notification::make()->warning()->body('Unable to add water bill')->send();
                            }
                        })->form([
                            Fieldset::make('')->schema(function (Tenant $record) {
                                return [
                                    TextInput::make('full_names')->disabled()->label('Tenant')->default($record->full_names),
                                    TextInput::make('property')->label('Property')->disabled()->default($record->property_name),
                                    TextInput::make('unit')->label('Unit')->disabled()->default($record->unit_name),
                                    TextInput::make('previous_reading')->label('Previous reading ( m3 )')->disabled()->dehydrated()->default(function (Tenant $record) {
                                        $tenant_exists = Waterbill::where('property_name', $record->property_name)
                                            ->where('tenant_id', $record->id)
                                            ->where('unit_name', $record->unit_name)->pluck('current_reading');
                                        if ($tenant_exists->isEmpty()) {
                                            return 0;
                                        } else {
                                            return $tenant_exists->last();
                                        }
                                    }),
                                    TextInput::make('current_reading')->label('Current reading ( m3)')->required()->integer()->minValue(function (Tenant $record) {
                                        $tenant_exists = Waterbill::where('property_name', $record->property_name)
                                            ->where('tenant_id', $record->id)
                                            ->where('unit_name', $record->unit_name)->pluck('current_reading');

                                        if ($tenant_exists->isEmpty()) {
                                            return 0;
                                        } else {
                                            return $tenant_exists->last() + 1;
                                        }
                                    }),
                                    DatePicker::make('date_added')->label('Date')->required()
                                ];
                            })->columns(3)
                        ])->visible(function (Tenant $record) {
                            $water_exists = false;
                            $has_water_utility = ActiveUtility::where('property_name', $record->property_name)->get('active_utilities')->toArray();
                            foreach ($has_water_utility  as $item) {
                                if (in_array('Water', $item['active_utilities'])) {
                                    $water_exists =  true;
                                    break;
                                }
                            }
                            return $water_exists;
                        }),
                    Action::make('Vacate tenant')->icon('heroicon-o-arrow-left-on-rectangle')->color('gray')->action(function ($record) {

                        $total_invoices =  Invoice::where('tenant_name', $record->full_names)->sum('balance');
                        $total_receipts =  Payment::where('tenant_name', $record->full_names)->sum('balance');

                        if (($total_invoices - $total_receipts) > 0) {
                            Notification::make()->warning()->body('Tenant has pending arrears.')->send();
                        } else {
                            $record->status = 'vacated';
                            $record->save();
                            $unit = Unit::where('unit_name', $record->unit_name);
                            $unit->first()->update(['status' => 'vacant']);
                        }
                    })->visible(fn ($record) => $record->status == 'active'),
                    EditAction::make(),
                    DeleteAction::make()->action(function ($record) {
                        Unit::where('unit_name', $record->unit_name)->update(['status' => 'vacant']);
                        optional($record->payments)->each(fn ($payment) => $payment->update(['status' => 'stale/' . $payment->status]));
                        optional($record->invoices)->each(fn ($invoice) => $invoice->update(['invoice_status' => 'stale/' . $invoice->invoice_status]));
                        optional($record->activeutility)->delete();
                        $record->update(['status' => 'stale']);
                        Notification::make()->success()->color('success')->body('Successfully deleted the tenant !')->send();
                    })
                ])->button()->label('Actions')->color('gray')
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    BulkAction::make('Invoice Rent')->icon('heroicon-o-ticket')->action(
                        function (Collection $records, array $data) {
                          //  $mail_config = Mailconfig::withoutGlobalScope(new ManagerScope())->where('manager_id', auth()->id())->first();
                            // $mail_config->mailer()->to($record->email)->send(new InvoiceSent($record, $new_data));

                            $records->each(function (Tenant $record) use ($data) {
                                $invoice_number = strtoupper(substr($record->property_name, 0, 3)) . "-" . time();
                                $new_data = array_merge(
                                    $data,
                                    [
                                        'invoice_title' => 'Rent Invoice',
                                        'invoice_number' => $invoice_number,
                                        'amount' => $record->rent,
                                        'quantity' => 1
                                    ]
                                );
                                $final_data = [
                                    'tenant_id' => $record->id,
                                    'national_id' => $record->id_number,
                                    'invoice_number' => $invoice_number,
                                    'invoice_type' => 'Rent',
                                    'invoice_status' => 'pending',
                                    'due_date' => $data['due_date'],
                                    'from' => $data['from'],
                                    'to' => $data['to'],
                                    'tenant_name' => $record->full_names,
                                    'property_name' => $record->property_name,
                                    'unit_name' => $record->unit_name,
                                    'invoice_description' => $data['invoice_details'],
                                    'amount_invoiced' =>  $record->rent,
                                    'balance' => $record->rent
                                ];
                                $final_invoice =  Invoice::create($final_data);
                                $total_debit = Statement::where('tenant_name', $record->full_names)->sum('debit');
                                $total_credit = Statement::where('tenant_name', $record->full_names)->sum('credit');

                                $statement_data = [
                                    'tenant_id' => $record->id,
                                    'tenant_name' => $record->full_names,
                                    'description' => 'Rent Invoice',
                                    'reference' => $final_invoice->invoice_number,
                                    'debit' => $final_invoice->balance,
                                    'credit' => 0,
                                    'balance' => $total_debit - ($total_credit - $final_invoice->balance),
                                    'cummulative_balance' => $total_debit - ($total_credit - $final_invoice->balance)
                                ];
                                $statement = Statement::create($statement_data);
                                InvoiceReceiptAutoAllocation::handleNewInvoice($final_invoice);
                            });

                            Notification::make()->success()->color('success')->title('Success')->body('Successfully Invoiced the tenant(s) .')->send();
                        }
                    )->form([
                        Fieldset::make("Rent Invoice")->schema([
                            DatePicker::make('due_date')->required(),
                            DatePicker::make('from')->required(),
                            DatePicker::make('to')->required(),
                            Textarea::make('invoice_details')->label('Note to tenant')->rows(2)->required()
                        ])
                    ]),
                    BulkAction::make('Utility Invoice')->icon('heroicon-o-funnel')->action(function (Collection $records, array $data, $livewire) {
                        $records->each(function (Tenant $record) use ($data, $livewire) {
                            $invoice_number = strtoupper(substr($record->property_name, 0, 3)) . "-" . time();

                            if ($livewire->tableFilters['Utility']['value'] == 'Water') {
                                $tenant_water = Waterbill::where('property_name', $record->property_name)
                                    ->where('unit_name', $record->unit_name)
                                    ->where('tenant_name', $record->full_names)->get();
                                if ($tenant_water->isNotEmpty()) {
                                    $quantity = $tenant_water->first()->current_reading - $tenant_water->first()->previous_reading;
                                    $get_amount = Utility::where('property_name', $record->property_name)->where('utility_name', 'Water')->get('amount');
                                    $amount = $get_amount->first()->amount;
                                }
                            } else {
                                $value  = Utility::where('property_name', $record->property_name)->where('utility_name', $livewire->tableFilters['Utility']['value'])->get();
                                $amount =  $value->first()->amount;
                                $quantity = 1;
                            }
                            $new_data = array_merge($data, [
                                'invoice_title' => $livewire->tableFilters['Utility']['value'],
                                'invoice_number' => $invoice_number,
                                'amount' => $amount,
                                'quantity' => $quantity
                            ]);
                            // $mail_config = Mailconfig::withoutGlobalScope(new ManagerScope())->where('manager_id', $record->manager_id)->first();
                            // $mail_config->mailer()->to($record->email)->send(new InvoiceSent($record, $new_data));
                            $final_data = [
                                'tenant_id' => $record->id,
                                'national_id' => $record->id_number,
                                'invoice_number' => $invoice_number,
                                'invoice_type' => $livewire->tableFilters['Utility']['value'],
                                'invoice_status' => 'pending',
                                'due_date' => $data['due_date'],
                                'from' => $data['from'],
                                'to' => $data['to'],
                                'tenant_name' => $record->full_names,
                                'property_name' => $record->property_name,
                                'unit_name' => $record->unit_name,
                                'invoice_description' => $data['invoice_details'],
                                'amount_invoiced' =>  $livewire->tableFilters['Utility']['value'] == 'Water' ? $amount * $quantity : $amount,
                                'balance' =>  $livewire->tableFilters['Utility']['value'] == 'Water' ? $amount * $quantity : $amount
                            ];
                            $final_invoice = Invoice::create($final_data);
                            $total_debit = Statement::where('tenant_name', $record->full_names)->sum('debit');
                            $total_credit = Statement::where('tenant_name', $record->full_names)->sum('credit');

                            $statement_data = [
                                'tenant_id' => $record->id,
                                'tenant_name' => $record->full_names,
                                'description' => $livewire->tableFilters['Utility']['value'],
                                'reference' => $final_invoice->invoice_number,
                                'debit' => $final_invoice->balance,
                                'credit' => 0,
                                'balance' => $total_debit - ($total_credit - $final_invoice->balance),
                                'cummulative_balance' => $total_debit - ($total_credit - $final_invoice->balance)
                            ];
                            $statement = Statement::create($statement_data);
                            InvoiceReceiptAutoAllocation::handleNewInvoice($final_invoice);
                        });
                    })->visible(fn ($livewire) => $livewire->tableFilters['Utility']['value'] != null ? true : false)->form(function ($livewire) {
                        return [
                            Fieldset::make($livewire->tableFilters['Utility']['value'] . " Invoice")->schema([
                                DatePicker::make('due_date')->required(),
                                DatePicker::make('from')->required(),
                                DatePicker::make('to')->required(),
                                Textarea::make('invoice_details')->label('Note to tenant')->rows(2)->required()
                            ])
                        ];
                    }),
                    BulkAction::make('Standard Invoice')->icon('heroicon-o-document-text')->deselectRecordsAfterCompletion()->action(function (Collection $records, array $data) {
                        $records->each(function (Tenant $record) use ($data) {
                            $invoice_number = strtoupper(substr($record->property_name, 0, 3)) . "-" . time();
                            $amount = $data['amount_invoiced'];
                            $quantity = 1;
                            $new_data = array_merge(
                                $data,
                                [
                                    'invoice_number' => $invoice_number,
                                    'amount' => $amount,
                                    'quantity' => $quantity
                                ]
                            );
                            // $mail_config = Mailconfig::where('manager_id', auth()->id());
                            // $get_mail_config = Mailconfig::find($mail_config->first()->id);
                            // $get_mail_config->mailer()->to($record)->send(new InvoiceSent($record, $new_data));
                            $final_data = [
                                'tenant_id' => $record->id,
                                'national_id' => $record->id_number,
                                'invoice_number' => $invoice_number,
                                'invoice_type' => 'Standard',
                                'invoice_status' => 'pending',
                                'due_date' => $data['due_date'], 'from' => $data['from'],
                                'to' => $data['to'], 'tenant_name' => $record->full_names,
                                'property_name' => $record->property_name, 'unit_name' => $record->unit_name,
                                'invoice_description' => $data['invoice_details'],
                                'amount_invoiced' => isset($data['amount_invoiced'])  ? $data['amount_invoiced'] : $amount,
                                'balance' => isset($data['amount_invoiced'])  ? $data['amount_invoiced'] : $amount
                            ];
                            $final_invoice =   Invoice::create($final_data);
                            $total_debit = Statement::where('tenant_name', $record->full_names)->sum('debit');
                            $total_credit = Statement::where('tenant_name', $record->full_names)->sum('credit');

                            $statement_data = [
                                'tenant_id' => $record->id,
                                'tenant_name' => $record->full_names,
                                'description' => 'Standard Invoice',
                                'reference' => $final_invoice->invoice_number,
                                'debit' => $final_invoice->balance,
                                'credit' => 0,
                                'balance' => $total_debit - ($total_credit - $final_invoice->balance),
                                'cummulative_balance' => $total_debit - ($total_credit - $final_invoice->balance)
                            ];
                            $statement = Statement::create($statement_data);
                            InvoiceReceiptAutoAllocation::handleNewInvoice($final_invoice);
                        });
                    })->form([
                        Fieldset::make("Standard Invoice")->schema([
                            TextInput::make('invoice_title')->required()->disabled()->default('Standard Invoice')->dehydrated(),
                            DatePicker::make('due_date')->required(),
                            DatePicker::make('from')->required(),
                            DatePicker::make('to')->required(),
                            TextInput::make('amount_invoiced')->integer()->required()->minValue(10),
                            Textarea::make('invoice_details')->label('Note to tenant')->rows(2)->required()
                        ])
                    ]),
                    // Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                // Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\UnitsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTenants::route('/'),
            'create' => Pages\CreateTenant::route('/create'),
            'edit' => Pages\EditTenant::route('/{record}/edit'),
            'view' => Pages\ViewTenant::route('/{record}')
        ];
    }


    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                InfoSection::make()
                    ->schema([
                        Split::make([
                            Grid::make(5)
                                ->schema([
                                    Group::make([
                                        TextEntry::make('full_names'),
                                        TextEntry::make('property_name'),
                                    ]),
                                    Group::make([
                                        TextEntry::make('email'),
                                        TextEntry::make('entry_date')->date()
                                    ]),
                                    Group::make([
                                        TextEntry::make('phone_number'),
                                        TextEntry::make('status')->badge()->color(fn ($state) => $state == 'active' ? 'success' : 'warning'),
                                    ]),
                                    Group::make([
                                        TextEntry::make('activeutility.active_utilities')->label('Active Utilities')->badge()->color('gray'),
                                        TextEntry::make('units.unit_name')->label('Unit (s)')->badge()->color('gray'),
                                    ]),
                                    Group::make([
                                        TextEntry::make('balance')->formatStateUsing(
                                            fn ($record) =>
                                            __('KES ' . number_format(Statement::where('tenant_name', $record->full_names)->selectRaw('SUM(debit) - SUM(credit) as balance')->first()->balance, 2, '.', ','))
                                        )->color(fn ($record) => Statement::where('tenant_name', $record->full_names)->selectRaw('SUM(debit) - SUM(credit) as balance')->first()->balance > 0 ? 'danger' : 'success')->weight('normal')
                                    ])
                                ]),
                        ])->from('lg'),
                    ])->collapsible(),
            ]);
    }
}
