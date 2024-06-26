<?php

namespace App\Filament\Manager\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use App\Filament\Manager\Resources\PaymentResource\Pages;
use App\Filament\Manager\Resources\PaymentResource\RelationManagers;
use App\Models\Payment;
use App\Models\Property;
use App\Models\Statement;
use App\Models\Tenant;
use App\Models\Unit;
use App\Models\User;
use App\Services\InvoiceReceiptAutoAllocation;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

class PaymentResource extends Resource
{
    protected static ?string $recordTitleAttribute = 'receipt_number';
    protected static ?string $model = Payment::class;
    protected static ?string $navigationGroup = 'Payments';
    // protected static ?string $navigationIcon = 'heroicon-s-banknotes';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->latest();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make()->schema([
                    Select::make('property_name')->options(Property::pluck('property_name', 'property_name'))->reactive()
                        ->disabled(fn ($context) => $context === 'edit'),
                    Select::make('unit_name')->options(function (Get $get) {
                        $property = $get('property_name');
                        if ($property) {
                            $unit =  Unit::where('property_name', $property)->where('status', 'occupied')->pluck('unit_name', 'unit_name');
                            return $unit;
                        }
                    })->afterStateUpdated(function ($state, Set $set) {
                        $tenant_name = Tenant::where('unit_name', $state)->get(['full_names', 'id_number']);
                        $set('tenant_name', $tenant_name->first()->full_names);
                        $set('national_id', $tenant_name->first()->id_number);
                    })->required()->reactive()->disabled(fn ($context) => $context === 'edit'),
                    TextInput::make('tenant_name')->disabled()->dehydrated(),
                    TextInput::make('national_id')->disabled()->dehydrated(),
                    Select::make('mode_of_payment')->options([
                        'Cash' => 'Cash', 'Pesalink' => 'Pesalink', 'Cheque' => 'Cheque', 'Paypal' => 'Paypal', 'Agent' => 'Agent'
                    ])->required()->reactive()->disabled(fn ($context) => $context === 'edit'),
                    TextInput::make('amount')->prefix('Ksh')->required()->integer()->minValue(0)->disabled(fn ($context) => $context === 'edit'),
                    TextInput::make('reference_number')->required()->disabled(fn ($context) => $context === 'edit')
                        ->visible(fn (Get $get) => $get('mode_of_payment') != null && $get('mode_of_payment') == 'Cash' ? false : true),
                    DateTimePicker::make('paid_date')->required()->maxDate(now())
                ])->columns(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('No')->rowIndex(),
                TextColumn::make('created_at')->size('sm')->datetime()->searchable()->label('Date'),
                TextColumn::make('tenant_name')->label('Tenant')->size('sm')->searchable()->sortable(),
                TextColumn::make('national_id')->label('Account')->size('sm')->searchable()->sortable()->copyable(),
                TextColumn::make('tenant.phone_number')->label('Phone')->searchable()->sortable()->copyable(),
                TextColumn::make('unit_name')->label('Unit')->size('sm')->searchable()->sortable(),
                TextColumn::make('receipt_number')->label('Receipt')->size('sm')->sortable()->searchable()->copyable(),
                TextColumn::make('mode_of_payment')->label('Mode')->size('sm')->searchable()->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('amount')->money('kes')->searchable(),
                TextColumn::make('balance')->money('kes')->searchable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('status')->badge()->color(fn (string $state): string => match ($state) {
                    'unallocated' => 'success',
                    'fully allocated' => 'gray',
                    'partially allocated' => 'warning',
                })->searchable(),
            ])->striped()
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
            ->actions([
                ActionGroup::make([
                    Tables\Actions\Action::make('Update Payment')->icon('heroicon-o-pencil-square')->action(function (array $data, $record) {
                        $tenant = Tenant::where('id_number', $data['account'])->first();
                        if (is_null($tenant)) {
                            Notification::make()->danger()->color('danger')->title('No record !')->body('No tenant with the ID number exists')->send();
                        } else {
                            $total_debit = Statement::where('tenant_name', $tenant->full_names)->sum('debit');
                            $total_credit = Statement::where('tenant_name', $tenant->full_names)->sum('credit');
                            $statement_data = [
                                'tenant_id' => $tenant->id,
                                'tenant_name' => $tenant->full_names,
                                'description' => 'Mpesa',
                                'reference' => $record->reference_number,
                                'credit' => $record->balance,
                                'debit' => 0,
                                'balance' => $total_debit - ($total_credit + $record->balance),
                                'cummulative_balance' => $total_debit - ($total_credit + $record->balance),
                                's_balance' => $total_debit - ($total_credit + $record->balance),
                            ];
                            try {
                                $statement = Statement::create($statement_data);
                                InvoiceReceiptAutoAllocation::handleNewReceipt($tenant->full_names, $record);

                            } catch (\Illuminate\Database\QueryException $e) {
                                Log::error('Error creating statement:', ['error' => $e->getMessage()]);
                            }


                        $record->update([
                                'tenant_id' => $tenant->id,
                                'property_name' => $tenant->property_name,
                                'unit_name' => $tenant->unit_name,
                                'tenant_name' => $tenant->full_names
                            ]);
                        }
                    })->visible(fn ($record) => empty($record->unit_name))->form([
                        Fieldset::make()->schema([
                            TextInput::make('account')->default(fn ($record) => $record->national_id),
                            TextInput::make('reference number')->default(fn ($record) => $record->reference_number)->disabled()->dehydrated(),
                            TextInput::make('amount')->default(fn ($record) => $record->amount)->disabled()->dehydrated()
                        ])->columns(3)
                    ]),
                    Tables\Actions\Action::make('pdf')
                        ->label('Download Receipt')
                        ->icon('heroicon-s-arrow-down-tray')
                        ->action(function (Model $record) {
                            $tenant = Tenant::find($record->tenant_id);
                            return response()->streamDownload(function () use ($record, $tenant) {
                                echo Pdf::loadHtml(
                                    Blade::render('pdfs/receipt', ['record' => $record, 'tenant' => $tenant])
                                )->stream();
                            }, $record->property_name . '-' . $record->tenant_name . '.pdf');
                        }),
                    DeleteAction::make()->action(function ($record) {
                        $record->update(['status' => 'stale/' . $record->status]);
                        Notification::make()->success()->color('success')->body('Payment deleted successfully !')->send();
                    })
                ])->button()->label('Actions')->color('gray')
            ])->headerActions([
                ExportAction::make()->outlined()->label('EXCEL')->color('gray')->exports([ExcelExport::make('table')->fromTable()->withFilename(date('Y-m-d') . ' - export')->askForWriterType()->except(['No'])]),
                FilamentExportHeaderAction::make('PDF')->label('PDF')->color('gray')->outlined()->disableAdditionalColumns()
                    ->disableCsv()->disableXlsx()->defaultFormat('pdf')->disableFilterColumns()->disablePreview()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([]),
            ])
            ->emptyStateActions([
                // Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\AllocationsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}
