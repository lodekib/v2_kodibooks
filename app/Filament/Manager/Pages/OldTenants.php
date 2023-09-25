<?php

namespace App\Filament\Manager\Pages;

use Filament\Pages\Page;

class OldTenants extends Page
{
    protected static ?string $navigationIcon = 'heroicon-s-user-minus';
    protected static ?string $navigationGroup = 'Archives';
    protected static string $view = 'filament.manager.pages.old-tenants';
}
