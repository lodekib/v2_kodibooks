<?php

namespace App\Filament\Manager\Resources\TenantResource\Pages;

use App\Filament\Manager\Resources\TenantResource;
use App\Models\Unit;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateTenant extends CreateRecord
{
    protected static string $resource = TenantResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()->success()->body('Tenant has been created successfully !');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function handleRecordCreation(array $data): Model
    {
        $unit  = Unit::select(['property_id', 'id'])->where('unit_name', $data['unit_name'])->get();
        $tenant_data = array_merge(
            $data,
            [
                'property_id' => $unit->first()->property_id,
                'balance' => intval($data['rent']) + intval($data['deposit'])
            ]
        );
        $response = $this->getModel()::create($tenant_data);

        if ($response) {
            $unit->first()->update([
                'status' => 'occupied',
                'tenant_id' => $response->id,
                'rent' => $data['rent'],
                'deposit' => $data['deposit']
            ]);
        }
        return $response;
    }
}
