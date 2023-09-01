<?php

namespace App\Filament\Manager\Resources;

use App\Filament\Manager\Resources\AllocationResource\Pages;
use App\Filament\Manager\Resources\AllocationResource\RelationManagers;
use App\Models\Allocation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AllocationResource extends Resource
{
    protected static ?string $model = Allocation::class;
    protected static ?string $navigationGroup = 'Payments';
    protected static ?string $navigationIcon = 'heroicon-s-scale';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')->date()->label('Date')->size('sm'),
                Tables\Columns\TextColumn::make('tenant_name')->size('sm')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('receipt_number')->size('sm')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('invoice_number')->size('sm')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('amount_allocated')->size('sm')->formatStateUsing(fn ($state) => 'Ksh ' . number_format($state)),
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
                // Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageAllocations::route('/'),
        ];
    }
}
