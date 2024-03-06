<?php

namespace App\Filament\Manager\Resources\VendorResource\Pages;

use App\Filament\Manager\Resources\VendorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\Pagination\CursorPaginator;

class ListVendors extends ListRecords
{
    protected static string $resource = VendorResource::class;


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
