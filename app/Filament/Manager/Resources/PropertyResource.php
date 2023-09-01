<?php

namespace App\Filament\Manager\Resources;

use App\Filament\Manager\Resources\PropertyResource\Pages;
use App\Filament\Manager\Resources\PropertyResource\RelationManagers;
use App\Models\Property;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PropertyResource extends Resource
{
    protected static ?string $model = Property::class;
    protected static ?string $navigationGroup = 'Assets';
    protected static ?string $navigationIcon = 'heroicon-s-building-office-2';

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
                        TextInput::make('property_name')->required()->unique(),
                        TextInput::make('number_of_units')->numeric()->minValue(1)->required(),
                        TextInput::make('property_size')->numeric()->minValue(1)->required()->prefix('sq . m'),
                        TextInput::make('property_cost')->prefix('Ksh')->required(),
                        Select::make('property_status')->options([
                            'maintenance' => 'Maintenance',
                            'good' => 'Good',
                        ]),
                        TextInput::make('property_location')->required(),
                        FileUpload::make('property_image')->image(),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')->label('Date')->date()->size('sm')->sortable(),
                TextColumn::make('property_name')->size('sm')->sortable()->searchable(),
                TextColumn::make('property_size')->size('sm')->suffix(' sq. m'),
                TextColumn::make('property_cost')->size('sm')->weight('bold')->prefix('Ksh ')->color('primary')
                    ->formatStateUsing(fn ($state) => number_format($state)),
                TextColumn::make('number_of_units')->size('sm'),
                TextColumn::make('property_status')->color(fn ($state) => $state == 'good' ? 'primary' : 'danger')->searchable()->badge(),
                TextColumn::make('property_location')->size('sm')->searchable()->sortable(),
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
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make()
                ])
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
            'index' => Pages\ListProperties::route('/'),
            'create' => Pages\CreateProperty::route('/create'),
            'edit' => Pages\EditProperty::route('/{record}/edit'),
        ];
    }


    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('name'),
                TextEntry::make('email'),
                TextEntry::make('notes')
                    ->columnSpanFull(),
            ]);
    }
}
