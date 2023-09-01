<?php

namespace App\Filament\Manager\Resources\AllocationResource\Pages;

use App\Filament\Manager\Resources\AllocationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAllocations extends ListRecords
{
    protected static string $resource = AllocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
