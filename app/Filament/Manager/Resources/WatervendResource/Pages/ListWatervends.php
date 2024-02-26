<?php

namespace App\Filament\Manager\Resources\WatervendResource\Pages;

use App\Filament\Manager\Resources\WatervendResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWatervends extends ListRecords
{
    protected static string $resource = WatervendResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->icon('heroicon-o-beaker')->label('New Water Vendor')->createAnother(false),
        ];
    }
}
