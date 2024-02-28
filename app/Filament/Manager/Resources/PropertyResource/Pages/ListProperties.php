<?php

namespace App\Filament\Manager\Resources\PropertyResource\Pages;

use App\Filament\Imports\PropertyImporter;
use App\Filament\Manager\Resources\PropertyResource;
use App\Models\Property;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Actions\ImportAction as ActionsImportAction;
use Filament\Resources\Pages\ListRecords;
use Konnco\FilamentImport\Actions\ImportAction;
use Konnco\FilamentImport\Actions\ImportField;

class ListProperties extends ListRecords
{
    protected static string $resource = PropertyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->icon('heroicon-o-plus-circle'),
            // Action::make('Sample template')->icon('heroicon-o-arrow-down-circle')->url(route('template.property')),
            ActionsImportAction::make()->label('Import Data')->importer(PropertyImporter::class)
            ->color('primary')->icon('heroicon-o-cloud-arrow-down'),
            // ImportAction::make()->uniqueField('property_name')->fields([
            //     ImportField::make('property_name')->required(),
            //     ImportField::make('property_size'),
            //     ImportField::make('property_cost'),
            //     ImportField::make('property_location')->required()
            // ], columns: 2)->icon('heroicon-o-arrow-down-tray')->mutateBeforeCreate(function ($row) {
            //     $row['property_status'] = 'good';
            //     return $row;
            // })->handleRecordCreation(function ($data) {
            //     return $this->getModel()::create($data);
            // }),
        ];
    }
}
