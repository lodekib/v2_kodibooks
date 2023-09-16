<?php

namespace App\Filament\Manager\Pages;

use Filament\Pages\Page;

class StaleInvoices extends Page
{
    protected static ?string $navigationIcon = 'heroicon-s-archive-box';
    protected static ?string $navigationGroup = 'Archives';
    protected static string $view = 'filament.manager.pages.stale-invoices';
}
