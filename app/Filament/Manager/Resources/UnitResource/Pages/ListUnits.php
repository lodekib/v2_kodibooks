<?php

namespace App\Filament\Manager\Resources\UnitResource\Pages;

use App\Filament\Imports\UnitImporter;
use App\Filament\Manager\Resources\UnitResource;
use App\Models\Property;
use Closure;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Actions\ImportAction as ActionsImportAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Get;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Str;
use Konnco\FilamentImport\Actions\ImportAction;
use Konnco\FilamentImport\Actions\ImportField;


class ListUnits extends ListRecords
{
    protected static string $resource = UnitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->icon('heroicon-o-plus-circle'),
            ActionsImportAction::make()->label('Import Data')->color('primary')->icon('heroicon-o-cloud-arrow-down')->importer(UnitImporter::class),
            // Action::make('Sample template')->icon('heroicon-o-arrow-down-circle')->url(route('template.unit')),
            // ImportAction::make()->fields([
            //     Select::make('property_name')->options(Property::pluck('property_name', 'property_name'))->required()->reactive(),
            //     ImportField::make('unit_name')
            //         ->rules([
            //             function ($row) {
            //                 return function (string $attribute, $value, Closure $fail) use ($row) {
            //                     $property_name = $row['property_name'];
            //                     if ($property_name != null) {
            //                         $property = Property::where('property_name', $property_name)->first();
            //                         $is_present = $property->units()->where('unit_name', $value)->first();
            //                         if ($is_present != null) {
            //                             $fail('The unit already exists in the property.');
            //                         }
            //                     }
            //                 };
            //             },
            //         ]),
            //     ImportField::make('unit_type')->label('unit_type')->mutateBeforeCreate(fn ($value) => Str::lower($value))->required(),
            //     ImportField::make('unit_size')->label('unit_size'),
            //     ImportField::make('rent')->label('rent'),
            //     ImportField::make('deposit')->label('deposit'),

            // ], columns: 2)->icon('heroicon-o-arrow-down-tray')->mutateBeforeCreate(function ($row) {
            //     $property = Property::where('property_name', $row['property_name'])->first(['manager_id', 'id']);
            //     $row['manager_id'] =  $property->manager_id;
            //     $row['property_id'] = $property->id;
            //     return $row;
            // })->handleRecordCreation(function ($data) {
            //     return $this->getModel()::create($data);
            // }),
        ];
    }
}
