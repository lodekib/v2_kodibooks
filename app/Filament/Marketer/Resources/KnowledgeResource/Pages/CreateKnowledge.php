<?php

namespace App\Filament\Marketer\Resources\KnowledgeResource\Pages;

use App\Filament\Marketer\Resources\KnowledgeResource;
use App\Models\Knowledgebase;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateKnowledge extends CreateRecord
{
    protected static string $resource = KnowledgeResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        return  $this->getModel()::create($data);
    }
}
