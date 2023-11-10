<?php

namespace App\Filament\Manager\Widgets;

use App\Models\ManagerInvoice;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ClientStats extends BaseWidget
{

    protected function getStats(): array
    {
        return [
            Stat::make('Total Invoices', ManagerInvoice::latest()->count()),
            Stat::make('Paid Invoices', ManagerInvoice::where('invoice_status', 'paid')->count()),
            Stat::make('Pending Invoices', ManagerInvoice::where('invoice_status', 'unpaid')->count()),
        ];
    }
}
