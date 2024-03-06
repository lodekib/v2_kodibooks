<?php

namespace App\Filament\Manager\Resources\WatervendResource\Pages;

use App\Filament\Manager\Resources\WatervendResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\Pagination\CursorPaginator;

class ListWatervends extends ListRecords
{
    protected static string $resource = WatervendResource::class;

    protected function paginateTableQuery(Builder $query): Paginator|CursorPaginator
    {
        return $query->fastPaginate(($this->getTableRecordsPerPage() === 'all') ? $query->count() : $this->getTableRecordsPerPage());

    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->icon('heroicon-o-beaker')->label('New Water Vendor')->createAnother(false),
        ];
    }
}
