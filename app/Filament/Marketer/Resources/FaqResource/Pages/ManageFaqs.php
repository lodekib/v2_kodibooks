<?php

namespace App\Filament\Marketer\Resources\FaqResource\Pages;

use App\Filament\Marketer\Resources\FaqResource;
use App\Models\Faq;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ManageRecords;

class ManageFaqs extends ManageRecords
{
    protected static string $resource = FaqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->icon('heroicon-o-question-mark-circle')->action(function (array $data) {
                $new_data = array_merge($data, ['marketer_id' => auth()->id()]);
                if(Faq::create($new_data)){
                    Notification::make()->success()->color('success')->title('Success')->body('FAQ added successfully .')->send();
                }
            }),
        ];
    }
}
