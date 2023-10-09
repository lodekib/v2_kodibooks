<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaybillResource\Pages;
use App\Filament\Resources\PaybillResource\RelationManagers;
use App\Models\Paybill;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaybillResource extends Resource
{
    protected static ?string $model = Paybill::class;

    protected static ?string $navigationIcon = 'heroicon-o-wallet';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make()->schema([
                    Select::make('manager_name')->options(User::role('manager')->pluck('name', 'name'))->required(),
                    TextInput::make('paybill_number')->required()->integer()->minLength(4),
                    TextInput::make('consumer_key')->required(),
                    TextInput::make('consumer_secret')->required()
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index')->rowIndex(),
                TextColumn::make('manager_name')->searchable()->sortable()->size('sm'),
                TextColumn::make('paybill_number')->size('sm')->searchable()->sortable(),
                TextColumn::make('consumer_key')->size('sm')->searchable()->formatStateUsing(fn($state) => Str::mask($state,'*',3)),
                TextColumn::make('consumer_secret')->size('sm')->searchable()->formatStateUsing(fn($state) => Str::mask($state,'*',3))
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
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePaybills::route('/'),
        ];
    }
}
