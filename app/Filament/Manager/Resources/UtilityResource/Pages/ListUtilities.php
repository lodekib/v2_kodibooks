<?php

namespace App\Filament\Manager\Resources\UtilityResource\Pages;

use App\Filament\Manager\Resources\UtilityResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUtilities extends ListRecords
{
    protected static string $resource = UtilityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
