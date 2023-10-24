<?php

namespace App\Filament\Manager\Pages;

use App\Filament\Manager\Widgets\CalendarWidget;
use Filament\Pages\Page;

class Reminders extends Page
{


    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.manager.pages.reminders';
    protected function getHeaderWidgets(): array
    {
        return [
            CalendarWidget::class
        ];
    }
}
