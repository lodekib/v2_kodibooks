<?php

namespace App\Filament\Manager\Resources\AllocationResource\Pages;

use App\Filament\Manager\Resources\AllocationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAllocation extends EditRecord
{
    protected static string $resource = AllocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
