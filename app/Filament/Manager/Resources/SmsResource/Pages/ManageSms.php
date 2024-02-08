<?php

namespace App\Filament\Manager\Resources\SmsResource\Pages;

use App\Filament\Manager\Resources\SmsResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ManageRecords;

class ManageSms extends ManageRecords
{
    protected static string $resource = SmsResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()->color('success')
            ->title('Sms Configured')
            ->body('Sms configurations created successfully.');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Configure SMS')->icon('heroicon-o-chat-bubble-bottom-center-text')->createAnother(false),
        ];
    }
}
