<?php

namespace App\Filament\Marketer\Resources\KnowledgeResource\Pages;

use App\Filament\Marketer\Resources\KnowledgeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKnowledge extends EditRecord
{
    protected static string $resource = KnowledgeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
