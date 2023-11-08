<?php

namespace App\Filament\Manager\Widgets;

use App\Models\ManagerInvoice;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class ClientTable extends BaseWidget
{

    protected  static ?string $heading = 'Subscription Invoices';
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(ManagerInvoice::query())
            ->columns([
                TextColumn::make('created_at')->size('sm')->date()
            ]);
    }
}
