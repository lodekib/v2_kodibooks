<?php

namespace App\Filament\Partner\Pages;

use Filament\Pages\Page;

class Faq extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';
    protected static ?string $pluralModel = 'Frequent Questions';
    protected static string $view = 'filament.partner.pages.faq';
}
