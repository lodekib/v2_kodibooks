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
        return $table->query(MpesaC2B::query())
            ->columns([
                TextColumn::make('created_at')->size('sm')
            ]);
    }
}
