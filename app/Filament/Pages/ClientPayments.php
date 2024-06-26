<?php

namespace App\Filament\Pages;

use App\Models\MpesaC2B;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class ClientPayments extends Page implements HasTable
{
    use InteractsWithTable;
    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationGroup = 'Clients';
    protected static string $view = 'filament.pages.client-payments';

    public function table(Table $table): Table
    {
        return $table->query(MpesaC2B::query()->latest())
            ->columns([
                TextColumn::make('created_at')->size('sm')->searchable()->sortable(),
                TextColumn::make('FirstName')->size('sm')->searchable()->sortable()->wrap(),
                TextColumn::make('Transaction_ID')->size('sm')->searchable()->sortable()->copyable(),
                TextColumn::make('Amount')->size('sm'),
                TextColumn::make('Account_Number')->size('sm')->copyable()->searchable()->sortable(),
                TextColumn::make('Phonenumber')->size('sm')->copyable()->searchable()->sortable(),
            ]);
    }
}
