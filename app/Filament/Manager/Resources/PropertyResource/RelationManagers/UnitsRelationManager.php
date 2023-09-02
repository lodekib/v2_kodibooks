<?php

namespace App\Filament\Manager\Resources\PropertyResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UnitsRelationManager extends RelationManager
{
    protected static string $relationship = 'units';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('unit_name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('unit_name')
            ->columns([
                TextColumn::make('created_at')->label('Date')->size('sm')->date(),
                TextColumn::make('unit_name')->size('sm')->searchable()->sortable(),
                IconColumn::make('unit_condition')->label('Condition')->icons([
                    'heroicon-o-check-circle' => 'good',
                    'heroicon-o-x-circle' => 'maintenance'
                ])
                    ->colors([
                        'success' => 'good',
                        'warning' => 'maintenance',
                    ]),
                TextColumn::make('unit_type')->size('sm')->sortable()->searchable()->badge(),
                TextColumn::make('rent')->size('sm')->prefix('Ksh '),
                TextColumn::make('deposit')->size('sm')->prefix('Ksh '),
                TextColumn::make('unit_size')->size('sm')->suffix(' sq. m'),
                TextColumn::make('status')->badge()->color(fn ($state) => $state == 'vacant' ? 'warning' : 'primary')->sortable()->searchable()
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
