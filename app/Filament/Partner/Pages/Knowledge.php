<?php

namespace App\Filament\Partner\Pages;

use App\Models\Knowledgebase;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class Knowledge extends Page
{
    public $record;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $title = 'Knowledge Area';
    protected static string $view = 'filament.partner.pages.knowledge';

    public function mount()
    {
        $partner = Auth::user();
        $this->record = Knowledgebase::with(['watchingPartners' => function ($query) use ($partner) {
            $query->where('partner_id', $partner->id);
        }, 'media'])->get();
    }
}
