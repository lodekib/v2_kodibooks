<?php

namespace App\Filament\Partner\Pages;

use App\Models\Knowledgebase;
use Filament\Pages\Page;

class Knowledge extends Page
{
    public $record;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $title = 'Knowledge Area';
    protected static string $view = 'filament.partner.pages.knowledge';

    public function mount()
    {
        $this->record = Knowledgebase::with('media')->get();
    }
}
