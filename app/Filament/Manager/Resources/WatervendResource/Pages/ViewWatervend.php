<?php

namespace App\Filament\Manager\Resources\WatervendResource\Pages;

use App\Filament\Manager\Resources\WatervendResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewWatervend extends ViewRecord
{
    protected static string $resource = WatervendResource::class;
    protected static string $view = 'filament.manager.resources.watervend-resource.pages.view-watervend';
}
