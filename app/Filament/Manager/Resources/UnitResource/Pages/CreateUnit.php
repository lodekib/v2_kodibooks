<?php

namespace App\Filament\Manager\Resources\UnitResource\Pages;

use App\Filament\Manager\Resources\UnitResource;
use App\Models\Property;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateUnit extends CreateRecord
{
    protected static string $resource = UnitResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()->success()
            ->body('Unit has been created successfully !');
    }

    protected function handleRecordCreation(array $data): Model
    {
        $property = Property::where('property_name', $data['property_name'])->get('id');
        $unit_data =  array_merge($data, ['property_id' => $property->first()->id]);

        return $this->getModel()::create($unit_data);
    }

    protected function getRedirectUrl(): string
    {

        return $this->getResource()::getUrl('index');
    }
}
