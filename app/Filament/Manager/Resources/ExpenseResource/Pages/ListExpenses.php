<?php

namespace App\Filament\Manager\Resources\ExpenseResource\Pages;

use App\Filament\Manager\Resources\ExpenseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\Pagination\CursorPaginator;

class ListExpenses extends ListRecords
{
    protected static string $resource = ExpenseResource::class;

    protected function paginateTableQuery(Builder $query): Paginator|CursorPaginator
    {
        return $query->fastPaginate(($this->getTableRecordsPerPage() === 'all') ? $query->count() : $this->getTableRecordsPerPage());

    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
