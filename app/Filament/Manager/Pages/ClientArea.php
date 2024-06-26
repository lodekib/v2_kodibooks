<?php

namespace App\Filament\Manager\Pages;

use App\Filament\Manager\Widgets\ClientStats;
use App\Filament\Manager\Widgets\ClientTable;
use App\Filament\Manager\Widgets\SubscriptionCards;
use Filament\Pages\Page;

class ClientArea extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-arrows-pointing-in';
    protected static string $view = 'filament.manager.pages.client-area';
    protected static bool $shouldRegisterNavigation = false;


    protected function getHeaderWidgets(): array
    {
        return [
            ClientStats::class,
        ];
    }
}
