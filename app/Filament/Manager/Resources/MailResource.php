<?php

namespace App\Filament\Manager\Resources;

use App\Filament\Manager\Resources\MailResource\Pages;
use App\Filament\Manager\Resources\MailResource\RelationManagers;
use App\Models\Mail;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MailResource extends Resource
{
    protected static ?string $recordTitleAttribute = 'smtp_username';
    protected static ?string $model = Mail::class;
    protected static ?string $navigationGroup = 'Settings';
    protected static ?string $navigationIcon = 'heroicon-s-envelope-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('smtp_username')->label('Username')->required(),
                TextInput::make('smtp_password')->label('Password')->required()->password()->prefixIcon('heroicon-o-key'),
                TextInput::make('smtp_from_address')->required()->email(),
                TextInput::make('smtp_from_name')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')->label('Date')->date()->size('sm'),
                TextColumn::make('smtp_username')->size('smtp_username')->size('sm')->icon('heroicon-o-envelope'),
                TextColumn::make('smtp_password')->size('sm')->icon('heroicon-o-key')->formatStateUsing(fn ($state) => Str::mask($state, '*', 2))
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
            'index' => Pages\ManageMails::route('/'),
        ];
    }
}
