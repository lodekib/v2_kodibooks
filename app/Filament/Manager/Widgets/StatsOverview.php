<?php

namespace App\Filament\Manager\Widgets;

use App\Models\Expense;
use App\Models\Extraexpense;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Property;
use App\Models\Statement;
use App\Models\Tenant;
use App\Models\Unit;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{

    protected static bool $isLazy = false;
    protected static ?string $pollingInterval = '2s';

    protected function getStats(): array
    {
        return [
            Stat::make('Apartments', number_format(Property::count()))->icon('heroicon-o-building-office-2')->url(route('filament.manager.resources.properties.index')),
            Stat::make('Total Units', number_format(Unit::count()))->icon('heroicon-o-cube-transparent')->url(route('filament.manager.resources.units.index')),
            Stat::make('Total Tenants', number_format(Tenant::count()))->icon('heroicon-o-user-group')->url(route('filament.manager.resources.tenants.index')),
            Stat::make('Income', 'KSH ' . number_format(Payment::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
                ->sum('amount')))
                ->description(Statement::sum('credit') >= 0 ? 'Increase this month' : 'Drop this month')
                ->descriptionIcon(Statement::sum('credit') >= 0 ? 'heroicon-s-arrow-trending-up' : 'heroicon-s-arrow-trending-down')
                ->chart(Statement::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->pluck('credit')->toArray())
                ->color(Statement::sum('credit') >= 0 ? 'success' : 'danger')->url(route('filament.manager.resources.tenants.index')),
            Stat::make('Expenses', 'KSH ' . number_format(
                Expense::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->sum('amount') + Extraexpense::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->sum('amount')
            ))
                ->description(' This month ')->url(route('filament.manager.resources.expenses.index'))
                ->chart(Expense::where('amount', '!=', null)->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->pluck('amount')->toArray())
                ->color('gray'),
            Stat::make('Arrears', 'KSH. ' . number_format(Invoice::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->where('balance','>',0)->sum('balance')))
                ->description(' This month of ' . Carbon::now()->format('F'))
                ->chart(Invoice::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->pluck('balance')->toArray())
                ->color('danger')->url(route('filament.manager.resources.tenants.index')),
        ];
    }
}
