<?php

namespace App\Filament\Manager\Resources\ManageuserResource\Pages;

use App\Filament\Manager\Resources\ManageuserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditManageuser extends EditRecord
{
    protected static string $resource = ManageuserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
