<?php

namespace App\Filament\Manager\Widgets;

use App\Models\ManagerInvoice;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\Pagination\CursorPaginator;

class ClientTable extends BaseWidget
{

    protected  static ?string $heading = 'Subscription Invoices';
    protected int | string | array $columnSpan = 'full';

    protected function paginateTableQuery(Builder $query): Paginator|CursorPaginator
    {
        return $query->fastPaginate(($this->getTableRecordsPerPage() === 'all') ? $query->count() : $this->getTableRecordsPerPage());

    }
    
    public function table(Table $table): Table
    {
        return $table
            ->query(ManagerInvoice::query())
            ->columns([
                TextColumn::make('created_at')->size('sm')->date()
            ]);
    }
}
