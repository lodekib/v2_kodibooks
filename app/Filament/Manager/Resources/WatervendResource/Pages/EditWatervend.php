<?php

namespace App\Filament\Manager\Resources\WatervendResource\Pages;

use App\Filament\Manager\Resources\WatervendResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWatervend extends EditRecord
{
    protected static string $resource = WatervendResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
