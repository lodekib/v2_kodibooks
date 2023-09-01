<?php

namespace App\Filament\Manager\Resources\AllocationResource\Pages;

use App\Filament\Manager\Resources\AllocationResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageAllocations extends ManageRecords
{
    protected static string $resource = AllocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
