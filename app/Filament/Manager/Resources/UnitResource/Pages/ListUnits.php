<?php

namespace App\Filament\Manager\Resources\UnitResource\Pages;

use App\Filament\Manager\Resources\UnitResource;
use App\Models\Property;
use Filament\Actions;
use Filament\Forms\Components\Select;
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
            Actions\CreateAction::make(),
            ImportAction::make()->uniqueField('unit_name')->fields([
                ImportField::make('unit_name')->label('unit_name')->required(),
                Select::make('property_name')->options(Property::pluck('property_name', 'property_name'))->required(),
                ImportField::make('unit_type')->label('unit_type')->mutateBeforeCreate(fn ($value) => Str::lower($value))->required(),
                ImportField::make('unit_size')->label('unit_size'),
                ImportField::make('rent')->label('rent'),
                ImportField::make('deposit')->label('deposit'),

            ], columns: 2)->icon('heroicon-o-arrow-down-tray')->mutateBeforeCreate(function ($row) {
                $property = Property::where('property_name', $row['property_name'])->get(['manager_id','id']);
                $row['manager_id'] =  $property->first()->manager_id;
                $row['property_id'] = $property->first()->id;
                return $row;
            })->handleRecordCreation(function ($data) {
                return $this->getModel()::create($data);
            }),
        ];
    }
}
