<?php

namespace App\Filament\Manager\Resources\PropertyResource\Pages;

use App\Filament\Manager\Resources\PropertyResource;
use App\Filament\Manager\Resources\PropertyResource\Widgets\PropertyStatistics;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProperty extends ViewRecord
{
  protected static string $resource = PropertyResource::class;
  protected static string $view = 'filament.manager.resources.property-resource.pages.view-property';


  public function getHeaderWidgetsColumns(): int | array
  {
    return 4;
  }


  protected function getHeaderWidgets(): array
  {
    return [
      PropertyStatistics::class
    ];
  }
}
