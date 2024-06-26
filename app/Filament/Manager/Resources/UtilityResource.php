<?php

namespace App\Filament\Manager\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use App\Filament\Manager\Resources\UtilityResource\Pages;
use App\Filament\Manager\Resources\UtilityResource\RelationManagers;
use App\Models\Property;
use App\Models\Utility;
use Filament\Forms;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

class UtilityResource extends Resource
{
    protected static ?string $recordTitleAttribute = 'utility_name';
    protected static ?string $model = Utility::class;
    protected static ?string $navigationGroup = 'Utilities';
    // protected static ?string $navigationIcon = 'heroicon-s-bolt';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Repeater::make('utilities')->schema([
                    Select::make('property_name')->options(Property::all()->pluck('property_name', 'property_name'))->required()->reactive(),
                    Radio::make('utility_type')->options(['fixed' => 'Fixed', 'custom' => 'Custom'])->required(),
                    TextInput::make('utility_name')->label('Utility')->required()->autocapitalize('words'),
                    TextInput::make('amount')->required()->label('Amount (Ksh)')->integer()->minValue(5),
                ])->columns(4)->columnSpanFull()->collapsible()->maxItems(3)->minItems(1)->addActionLabel('Another  utility')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('No')->rowIndex(),
                TextColumn::make('created_at')->label('Date')->date()->size('sm'),
                TextColumn::make('property_name')->size('sm')->searchable()->sortable(),
                TextColumn::make('utility_type')->size('sm')->searchable()->sortable()->badge(),
                TextColumn::make('utility_name')->size('sm')->searchable()->sortable(),
                TextColumn::make('amount')->size('sm')->label('Amount')->money('kes')
            ])
            ->striped()
            ->filters([
                //
            ])->headerActions([
                ExportAction::make()->outlined()->label('EXCEL')->color('gray')->exports([ExcelExport::make('table')->fromTable()->withFilename(date('Y-m-d') . ' - export')->askForWriterType()->except(['No'])]),
                FilamentExportHeaderAction::make('PDF')->label('PDF')->color('gray')->outlined()->disableAdditionalColumns()
                ->disableCsv()->disableXlsx()->defaultFormat('pdf')->disableFilterColumns()->disablePreview()
                ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make()
                ])->button()->label('Actions')->color('gray')
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUtilities::route('/'),
            'create' => Pages\CreateUtility::route('/create'),
            'edit' => Pages\EditUtility::route('/{record}/edit'),
        ];
    }
}
