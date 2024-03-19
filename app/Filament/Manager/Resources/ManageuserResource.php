<?php

namespace App\Filament\Manager\Resources;

use App\Filament\Manager\Resources\ManageuserResource\Pages;
use App\Filament\Manager\Resources\ManageuserResource\RelationManagers;
use App\Models\Manageuser;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Spatie\Permission\Models\Role;

class ManageuserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationGroup = 'Settings';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationLabel = 'Manage Users';
    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('email')->email()->required(),
                Select::make('role')->options(['Caretaker' => 'Caretaker'])->required(),
                TextInput::make('password')->password()->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table->query(User::query()->role('Caretaker')->latest())
            ->columns([
                TextColumn::make('created_at')->label('Date')->date()->size('sm'),
                TextColumn::make('name')->size('sm')->searchable()->sortable(),
                TextColumn::make('email')->size('sm')->searchable()->sortable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListManageusers::route('/'),
            'create' => Pages\CreateManageuser::route('/create'),
            'edit' => Pages\EditManageuser::route('/{record}/edit'),
        ];
    }
}
