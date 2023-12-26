<?php

namespace App\Filament\Manager\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use App\Filament\Manager\Resources\PropertyResource\Pages;
use App\Filament\Manager\Resources\PropertyResource\RelationManagers;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Property;
use App\Models\Tenant;
use App\Models\Unit;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\Split;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Component;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

class PropertyResource extends Resource
{
    protected static ?string $recordTitleAttribute = 'property_name';
    protected static ?string $model = Property::class;
    protected static ?string $navigationGroup = 'Assets';
    // protected static ?string $navigationIcon = 'heroicon-s-building-office-2';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make()
                    ->schema([
                        TextInput::make('property_name')->required()->unique(ignoreRecord: true),
                        // TextInput::make('number_of_units')->integer()->minValue(1)->required(),
                        TextInput::make('property_size')->integer()->minValue(1)->required()->prefix('sq . m'),
                        TextInput::make('property_cost')->prefix('Ksh')->required()->integer()->minValue(0),
                        Select::make('property_status')->options(['good' => 'Good', 'maintenance' => 'Maintenance',]),
                        TextInput::make('property_location')->required(),
                        FileUpload::make('property_image')->image()->previewable(),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('No')->rowIndex(),
                TextColumn::make('property_name')->label('Name')->size('sm')->sortable()->searchable(),
                TextColumn::make('property_size')->label('Size')->size('sm')->suffix(' sq. m'),
                TextColumn::make('property_cost')->label('Cost')->size('sm')->money('kes'),
                TextColumn::make('number_of_units')->label('No. Units')->size('sm')->state(fn($record) => $record->units->count()),
                TextColumn::make('property_status')->label('status')->color(fn ($state) => $state == 'good' ? 'primary' : 'danger')->searchable()->badge(),
                TextColumn::make('property_location')->label('Location')->size('sm')->searchable()->sortable(),
            ])
            ->striped()
            ->filters([
                Filter::make('Good')->query(fn (Builder $query): Builder => $query->where('property_status', 'good')),
                Filter::make('Maintenace')->query(fn (Builder $query): Builder => $query->where('property_status', 'maintenance')),
                Filter::make('created_at')->form([
                    DatePicker::make('created_from')->label('From'),
                    DatePicker::make('created_until')->label('To')->default(now())
                ])->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when($data['created_from'], fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date))
                        ->when($data['created_until'], fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date));
                }),
            ])->headerActions([
                ExportAction::make()->outlined()->label('EXCEL')->color('gray')->exports([ExcelExport::make('table')->fromTable()->withFilename(date('Y-m-d') . ' - export')->askForWriterType()->except(['No'])]),
                FilamentExportHeaderAction::make('PDF')->label('PDF')->color('gray')->outlined()->disableAdditionalColumns()
                ->disableCsv()->disableXlsx()->defaultFormat('pdf')->disableFilterColumns()->disablePreview()
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make()->action(function ($record) {
                        $record->units->each(function (Unit $unit) {
                            $unit->update(['status' => 'stale/' . $unit->status]);
                        });
                        $record->tenants->each(function (Tenant $tenant) {
                            $tenant->update(['status' => 'stale']);
                        });
                        $record->payments->each(function (Payment $payment) {
                            $payment->update(['status' => 'stale/' . $payment->status]);
                        });
                        $record->invoices->each(function (Invoice $invoice) {
                            $invoice->update(['invoice_status' => 'stale/' . $invoice->invoice_status]);
                        });
                        $record->delete();

                        Notification::make()->success()->color('success')->body('Successfully deleted the property.')->send();
                    })
                ])->button()->label('Actions')->color('gray')
            ])
            ->bulkActions([])
            ->emptyStateActions([
                // Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\UnitsRelationManager::class,
            RelationManagers\TenantsRelationManager::class
        ];
    }



    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProperties::route('/'),
            'create' => Pages\CreateProperty::route('/create'),
            'edit' => Pages\EditProperty::route('/{record}/edit'),
            'view' => Pages\ViewProperty::route('/{record}')
        ];
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make()
                    ->schema([
                        Split::make([
                            Grid::make(4)
                            ->schema([
                                    Group::make([
                                        TextEntry::make('property_name'),
                                    ]),
                                    Group::make([
                                       TextEntry::make('property_location') 
                                    ]),
                                    Group::make([
                                        TextEntry::make('property_status')->badge()
                                    ]),
                                    ImageEntry::make('property_image')->grow(false)
                                ]),
                        ])->from('lg'),
                    ])->collapsible(),
            ]);
    }
}
