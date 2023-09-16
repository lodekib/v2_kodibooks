<?php

namespace App\Filament\Manager\Pages;

use Filament\Pages\Page;

class ArchivedPayments extends Page
{
    protected static ?string $navigationIcon = 'heroicon-s-document-minus';
    protected static ?string $navigationGroup = 'Archives';
    protected static string $view = 'filament.manager.pages.archived-payments';

 
}
