<?php

namespace App\Filament\Partner\Pages;

use App\Models\Faq as ModelFaq;
use Filament\Pages\Page;

class Faq extends Page
{
    public $records;
    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';
    protected static string $view = 'filament.partner.pages.faq';
    protected static ?string $title = 'Frequently Asked Questions';


    public function mount()
    {
        $this->records = ModelFaq::get();
    }

}
