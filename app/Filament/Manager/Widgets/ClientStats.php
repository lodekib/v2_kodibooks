<?php

namespace App\Filament\Manager\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ClientStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Invoices', '1'),
            Stat::make('Paid Invoices', '1'),
            Stat::make('Pending Invoices', '0'),
        ];
    }
}
