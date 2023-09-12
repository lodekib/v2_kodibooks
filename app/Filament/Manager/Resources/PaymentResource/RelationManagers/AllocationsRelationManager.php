<?php

namespace App\Filament\Manager\Resources\PaymentResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AllocationsRelationManager extends RelationManager
{
    protected static string $relationship = 'allocations';


    public function isReadOnly(): bool
    {
        return true;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('receipt_number')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('receipt_number')
            ->columns([
                TextColumn::make('created_at')->date()->size('sm')->label('Date'),
                TextColumn::make('tenant_name')->size('sm')->searchable()->sortable(),
                TextColumn::make('receipt_number')->size('sm')->searchable()->sortable(),
                TextColumn::make('invoice_number')->size('sm')->sortable()->searchable(),
                TextColumn::make('amount_allocated')->size('sm')->money('kes')->summarize(Sum::make()->money('kes'))
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
