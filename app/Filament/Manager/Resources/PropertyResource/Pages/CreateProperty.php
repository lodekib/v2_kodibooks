<?php

namespace App\Filament\Manager\Resources\PropertyResource\Pages;

use App\Filament\Manager\Resources\PropertyResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateProperty extends CreateRecord
{
    protected static string $resource = PropertyResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()->color('success')
            ->body('The property has been created successfully.');
    }
}
