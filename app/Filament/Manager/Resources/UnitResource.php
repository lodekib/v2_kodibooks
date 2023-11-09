<?php

namespace App\Filament\Manager\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use App\Filament\Manager\Resources\UnitResource\Pages;
use App\Filament\Manager\Resources\UnitResource\RelationManagers;
use App\Models\Property;
use App\Models\Unit;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UnitResource extends Resource
{
    protected static ?string $recordTitleAttribute = 'unit_name';
    protected static ?string $model = Unit::class;
    protected static ?string $navigationGroup = 'Assets';
    // protected static ?string $navigationIcon = 'heroicon-s-cube-transparent';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('property_name')->options(Property::all()->pluck('property_name', 'property_name'))->required()->reactive(),
                TextInput::make('unit_name')->required()->rules([
                    function (Get $get) {
                        return function (string $attribute, $value, Closure $fail) use ($get) {
                            $property_name = $get('property_name');
                            if ($property_name != null) {
                                $property = Property::where('property_name', $property_name)->first();
                                $is_present = $property->units()->where('unit_name', $value)->first();
                                if ($is_present != null) {
                                    $fail('The unit already exists in the property.');
                                }
                            }
                        };
                    },
                ]),
                Select::make('unit_type')->options(['bedsitter' => 'Bedsitter', 'one_bedroom' => 'One Bedroom', 'two_bedroom' => 'Two Bedroom',])->required(),
                TextInput::make('unit_size')->integer()->minValue(1)->required()->prefix('sq . m')->required(),
                TextInput::make('rent')->prefix('Ksh')->required()->integer()->minValue(1),
                TextInput::make('deposit')->prefix('Ksh')->required()->lte('rent')->integer()->minValue(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table->groups(['status','property_name'])
            ->columns([
                TextColumn::make('No')->rowIndex(),
                TextColumn::make('created_at')->label('Date')->size('sm')->date(),
                TextColumn::make('unit_name')->size('sm')->searchable()->sortable(),
                TextColumn::make('property_name')->size('sm')->searchable()->sortable(),
                TextColumn::make('unit_type')->size('sm')->sortable()->searchable()->badge(),
                TextColumn::make('rent')->size('sm')->money('kes'),
                TextColumn::make('deposit')->size('sm')->money('kes'),
                TextColumn::make('unit_size')->size('sm')->suffix(' sq. m'),
                TextColumn::make('status')->badge()->color(fn ($state) => $state == 'vacant' ? 'warning' : 'primary')->sortable()->searchable()
            ])
            ->striped()
            ->filters([
                //
            ])->headerActions([FilamentExportHeaderAction::make('Generate Reports')->color('gray')->disableAdditionalColumns()])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make()
                ])->button()->label('Actions')->color('gray')
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                     Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListUnits::route('/'),
            'create' => Pages\CreateUnit::route('/create'),
            'edit' => Pages\EditUnit::route('/{record}/edit'),
        ];
    }
}
