<?php

namespace App\Filament\Manager\Pages;

use Filament\Pages\Page;

class PayPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static bool $shouldRegisterNavigation = false;
    protected static string $view = 'filament.manager.pages.pay-page';

}
