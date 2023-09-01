<?php

namespace App\Filament\Manager\Resources\TenantResource\Pages;

use App\Filament\Manager\Resources\TenantResource;
use App\Models\Property;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Konnco\FilamentImport\Actions\ImportAction;
use Konnco\FilamentImport\Actions\ImportField;

class ListTenants extends ListRecords
{
    protected static string $resource = TenantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            ImportAction::make()->uniqueField('id_number')->fields([
                ImportField::make('full_names')->required(),
                ImportField::make('email')->required(),
                ImportField::make('phone_number')->required(),
                ImportField::make('id_number')->required(),
                ImportField::make('property_name')->required()->rules('exists:properties,property_name'),
                ImportField::make('unit_name')->rules('exists:units,unit_name'),
                ImportField::make('rent'),
                ImportField::make('deposit'),
                ImportField::make('balance'),
                ImportField::make('arrears'),
                ImportField::make('surplus'),
                ImportField::make('entry_date'),
            ], columns: 4)->icon('heroicon-o-arrow-down-tray')
            ->handleRecordCreation(function ($data) {
                $property =  Property::where('property_name', $data['property_name'])->pluck('id');
                $new_data = array_merge($data, ['property_id' => $property[0]]);
                return  $this->getModel()::create($new_data);
            }),
        ];
    }
}
