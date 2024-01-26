<?php

namespace App\Filament\Marketer\Resources\KnowledgeResource\Pages;

use App\Filament\Marketer\Resources\KnowledgeResource;
use App\Models\Knowledgebase;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewKnowledge extends ViewRecord
{
    protected static string $resource = KnowledgeResource::class;
    protected static string $view = 'filament.marketer.resources.knowledge-resource.pages.view-knowledge';
}
