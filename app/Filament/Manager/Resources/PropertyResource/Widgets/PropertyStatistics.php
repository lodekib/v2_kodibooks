<?php

namespace App\Filament\Manager\Resources\PropertyResource\Widgets;

use App\Models\Expense;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Unit;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PropertyStatistics extends BaseWidget


{
    public $record;
    
    protected function getStats(): array
    {
        return [
            Stat::make('Income (Ksh)', number_format(Payment::where('property_name',$this->record->property_name)->sum('amount')))->description('This '.Carbon::now()->format('F'))->color('success'),
            Stat::make('Arrears (Ksh)', number_format(Invoice::where('property_name',$this->record->property_name)->sum('balance')))->description('This '.Carbon::now()->format('F'))->color('danger'),
            Stat::make('Expenses (Ksh)', number_format(Expense::where('property_name',$this->record->property_name)->sum('amount')))->description('This '.Carbon::now()->format('F'))->color('success'),
            Stat::make('Units', ''.number_format(Unit::where('property_name',$this->record->property_name)->count()))
        ];
    }
}
