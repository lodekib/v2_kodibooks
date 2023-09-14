<?php

namespace App\Filament\Manager\Resources\ExpenseResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExtraexpensesRelationManager extends RelationManager
{
    protected static string $relationship = 'extraexpenses';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('expense')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table->poll('2s')
            ->recordTitleAttribute('expense')
            ->columns([
                TextColumn::make('expense.incurred_date')->date()->size('sm'),
                TextColumn::make('expense')->size('sm')->searchable()->sortable(),
                TextColumn::make('description')->size('sm')->searchable(),
                TextColumn::make('amount')->size('sm')->money('kes')->summarize(Sum::make()->label('Total Expenses')->money('kes'))
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()->label('Extra Expense'),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
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
}
