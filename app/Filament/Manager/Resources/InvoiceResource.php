<?php

namespace App\Filament\Manager\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use AlperenErsoy\FilamentExport\FilamentExport;
use App\Filament\Manager\Resources\InvoiceResource\Pages;
use App\Filament\Manager\Resources\InvoiceResource\RelationManagers;
use App\Models\Invoice;
use App\Models\Property;
use App\Models\Statement;
use App\Models\Tenant;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

class InvoiceResource extends Resource
{
    protected static ?string $recordTitleAttribute = 'invoice_number';
    protected static ?string $model = Invoice::class;
    protected static ?string $navigationGroup = 'Invoices';
    // protected static ?string $navigationIcon = 'heroicon-s-newspaper';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->latest();
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    Select::make('property_name')->options(Property::pluck('property_name', 'property_name'))->reactive()->required(),
                    Select::make('unit_name')->options(function (Get $get) {
                        $property_name = $get('property_name');
                        if ($property_name != null) {
                            $property = Property::where('property_name', $property_name)->first();
                            $units =   $property->units()->where('status', 'occupied')->pluck('unit_name', 'unit_name');
                            return $units;
                        } else {
                            return [];
                        }
                    })->required(),
                    // TextInput::make('invoice_number')->required()->disabled(fn($context) => $context === 'edit'),
                    TextInput::make('amount_invoiced')->integer()->required()->minValue(1)->disabled(fn ($context) => $context === 'edit'),
                    DateTimePicker::make('due_date')->required(),
                    DatePicker::make('from')->required()->maxDate(now()),
                    DatePicker::make('to')->required(),
                    Radio::make('invoice_type')->options(['Standard' => 'Standard', 'Rent' => 'Rent'])->required()->inline(),
                    Textarea::make('invoice_description')->required()
                ])->columns(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('No')->rowIndex(),
                TextColumn::make('created_at')->label('Date')->datetime()->size('sm'),
                TextColumn::make('property_name')->label('Property')->size('sm')->searchable()->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('tenant_name')->label('Tenant')->size('sm')->searchable()->sortable(),
                TextColumn::make('unit_name')->label('Unit')->size('sm')->sortable()->searchable(),
                TextColumn::make('invoice_number')->label('INV')->size('sm')->searchable()->sortable(),
                TextColumn::make('invoice_type')->label('Type')->size('sm')->searchable()->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('invoice_status')->label('Status')->color(fn (string $state): string => match ($state) {
                    'pending' => 'warning',
                    'partially paid' => 'gray',
                    'fully paid' => 'success'
                })->label('Status')->searchable()->sortable()->badge(),
                TextColumn::make('amount_invoiced')->label('Amount')->size('sm')->money('kes')->searchable(),
                TextColumn::make('balance')->label('Balance')->size('sm')->money('kes')
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
                ExportAction::make()->outlined()->label('EXCEL')->color('gray')->exports([ExcelExport::make('table')->fromTable()->withFilename(date('Y-m-d') . ' - export')->askForWriterType()->except(['No'])]),
                FilamentExportHeaderAction::make('PDF')->label('PDF')->color('gray')->outlined()->disableAdditionalColumns()
                    ->disableCsv()->disableXlsx()->defaultFormat('pdf')->disableFilterColumns()->disablePreview()               // FilamentExportHeaderAction::make('Generate Reports')->color('gray')->icon('heroicon-o-clipboard-document')->disableAdditionalColumns()
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make()->action(function ($record) {
                        optional($record->statement)->delete();
                        $record->update(['invoice_status' => 'stale/' . $record->invoice_status]);
                        Notification::make()->success()->color('success')->body('Invoice deleted successfully')->send();
                    })
                ])->button()->label('Actions')->color('gray')
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->action(function (Collection $records) {
                        $records->each(fn ($record) => $record->update(['invoice_status' => 'stale/' . $record->invoice_status]));
                    }),
                ]),
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
            'index' => Pages\ListInvoices::route('/'),
            'create' => Pages\CreateInvoice::route('/create'),
            'edit' => Pages\EditInvoice::route('/{record}/edit'),
        ];
    }
}
