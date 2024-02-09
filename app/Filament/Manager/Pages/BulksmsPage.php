<?php

namespace App\Filament\Manager\Pages;

use App\Livewire\BulkTenant;
use Filament\Pages\Page;

class BulksmsPage extends Page
{
    protected static ?string $navigationGroup = 'Settings';
    protected static ?string $navigationLabel = 'Bulk SMS';
    protected static ?int $navigationSort = 2;
    protected static string $view = 'filament.manager.pages.bulksms-page';
    protected static ?string $title = 'Bulk Messaging';
}
