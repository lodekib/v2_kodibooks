<?php

namespace App\Filament\Manager\Resources;

use App\Filament\Manager\Resources\SmsResource\Pages;
use App\Filament\Manager\Resources\SmsResource\RelationManagers;
use App\Models\Sms;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SmsResource extends Resource
{
    protected static ?string $model = Sms::class;
    protected static ?string $pluralModelLabel = 'Configure SMS';
    protected static ?string $navigationGroup = 'Settings';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('SMS Configuration Area')->schema([
                    TextInput::make('at_username')->label('Username')->required(),
                    TextInput::make('at_key')->label('API Key')->required()->password(),
                    TextInput::make('at_from')->label('Sender ID')->required()
                ])->columns(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('at_username')->size('sm')->searchable(),
                TextColumn::make('at_key')->size('sm')->formatStateUsing(fn ($state) => Str::mask($state, '*', 2)),
                TextColumn::make('at_from')->size('sm'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSms::route('/'),
        ];
    }
}
