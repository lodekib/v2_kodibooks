<?php

namespace App\Filament\Manager\Resources\PropertyResource\Pages;

use App\Filament\Manager\Resources\PropertyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use pxlrbt\FilamentExcel\Actions\Pages\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

class ListProperties extends ListRecords
{
    protected static string $resource = PropertyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            // ExportAction::make()->exports([
            //     ExcelExport::make()->queue()
            // ])
        ];
    }
}
