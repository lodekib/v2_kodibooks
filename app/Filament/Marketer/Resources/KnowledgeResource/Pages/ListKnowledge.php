<?php

namespace App\Filament\Marketer\Resources\KnowledgeResource\Pages;

use App\Filament\Marketer\Resources\KnowledgeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKnowledge extends ListRecords
{
    protected static string $resource = KnowledgeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->icon('heroicon-o-film')->label('New Video'),
        ];
    }
}
