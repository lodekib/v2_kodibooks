<?php

namespace App\Filament\Manager\Resources\UtilityResource\Pages;

use App\Filament\Manager\Resources\UtilityResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateUtility extends CreateRecord
{
    protected static string $resource = UtilityResource::class;
    protected static bool $canCreatAnother = false;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()->success()->color('success')->body('Utility(s)  added successfully !');
    }
    protected function getRedirectUrl(): string
    {

        return $this->getResource()::getUrl('index');
    }


    protected function handleRecordCreation(array $data): Model
    {
        foreach ($data['utilities'] as $datum) {
            $response = $this->getModel()::create($datum);
        }

        return $response;
    }
}
