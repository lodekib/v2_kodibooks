<?php

namespace App\Filament\Manager\Resources\TenantResource\Pages;

use App\Filament\Manager\Resources\TenantResource;
use App\Models\Property;
use App\Models\Unit;
use Filament\Actions;
use Filament\Actions\Action;
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
            Action::make('Sample template')->icon('heroicon-o-arrow-down-circle')->url(route('template.tenant')),
            ImportAction::make()->uniqueField('id_number')->fields([
                ImportField::make('full_names')->required(),
                ImportField::make('email')->required(),
                ImportField::make('phone_number')->required(),
                ImportField::make('id_number')->required(),
                ImportField::make('property_name')->required()->rules('exists:properties,property_name'),
                ImportField::make('unit_name')->rules('exists:units,unit_name'),
                ImportField::make('rent'),
                ImportField::make('deposit'),
                ImportField::make('arrears'),
                ImportField::make('surplus'),
                ImportField::make('entry_date'),
            ], columns: 4)->icon('heroicon-o-arrow-down-tray')
                ->handleRecordCreation(function ($data) {
                    $property =  Property::where('property_name', $data['property_name'])->pluck('id');
                    $new_data = array_merge($data, ['property_id' => $property[0]]);
                    $tenant =  $this->getModel()::create($new_data);

                    if ($tenant) {
                        Unit::where('unit_name', $data['unit_name'])->update(['status' => 'occupied']);
                    }
                    return $tenant;
                }),
        ];
    }
}
