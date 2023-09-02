<?php

namespace App\Filament\Manager\Resources\PropertyResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TenantsRelationManager extends RelationManager
{
    protected static string $relationship = 'tenants';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('full_names')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('full_names')
            ->columns([
                TextColumn::make('created_at')->label('Date')->date()->size('sm')->sortable(),
                TextColumn::make('full_names')->size('sm')->searchable()->sortable(),
                TextColumn::make('email')->size('sm')->sortable()->searchable(),
                TextColumn::make('unit_name')->size('sm')->searchable()->sortable(),
                TextColumn::make('rent')->size('sm')->prefix('Ksh ')->formatStateUsing(fn ($state) => number_format($state)),
                TextColumn::make('deposit')->size('sm')->prefix('Ksh ')->formatStateUsing(fn ($state) => number_format($state)),
                TextColumn::make('balance')->weight('bold')->color('danger')->prefix('Ksh '),
                // ->color(function ($record) {
                //     $total_debit = Statement::where('tenant_name', $record->full_names)->sum('debit');
                //     $total_credit = Statement::where('tenant_name', $record->full_names)->sum('credit');
                //     return $total_credit >= $total_debit ? 'primary' : 'warning';
                // })
                // ->prefix('Ksh ')->size('sm')->formatStateUsing(function ($record) {
                //     $total_debit = Statement::where('tenant_name', $record->full_names)->sum('debit');
                //     $total_credit = Statement::where('tenant_name', $record->full_names)->sum('credit');
                //     return number_format($total_debit - $total_credit);
                // }),
                TextColumn::make('entry_date')->size('sm'),
                TextColumn::make('status')->colors([
                    'success' => static fn ($state): bool => $state === 'active',
                    'warning' => static fn ($state): bool => $state === 'inactive',
                ])->badge(),
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
