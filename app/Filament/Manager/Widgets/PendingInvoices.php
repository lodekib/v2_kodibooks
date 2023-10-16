<?php

namespace App\Filament\Manager\Widgets;

use App\Models\Invoice;
use App\Models\Statement;
use Carbon\Carbon;
use Filament\Tables;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class PendingInvoices extends BaseWidget
{

    protected static ?int $sort = 5;
    protected  int|string|array $columnSpan  = 'full';
    public function table(Table $table): Table
    {
        return $table
            ->query(Invoice::where('invoice_status', '!=', 'fully paid'))
            ->columns([
                TextColumn::make('No')->rowIndex(),
                TextColumn::make('due_date')->datetime()->size('sm'),
                TextColumn::make('property_name')->size('sm')->searchable()->sortable(),
                TextColumn::make('unit_name')->size('sm')->sortable()->searchable(),
                TextColumn::make('invoice_number')->size('sm')->searchable()->sortable(),
                TextColumn::make('invoice_type')->size('sm')->searchable()->sortable(),
                TextColumn::make('invoice_status')->badge()->color(fn (string $state): string => match ($state) {
                    'pending' => 'warning',
                    'partially paid' => 'gray',
                    'fully paid' => 'success'
                })->searchable()->sortable(),
                TextColumn::make('amount_invoiced')->size('sm')->money('kes')->summarize(Sum::make()->label('Total Invoiced')->money('kes')),
                TextColumn::make('balance')->size('sm')->money('kes')
            ])->filters([
                SelectFilter::make('Due Days')->options([
                    '1-7' => '1 - 7 days',
                    '8-14' => '8 - 14 days',
                    '15-30' => '15+ days',
                ])
                ->query(function (Builder $query, array $data): Builder {
                    $days = $data['value'];
                    if ($days != null) {
                        $today = Carbon::now();
                        $range = explode('-', $days);
                        $daysAgo = $today->copy()->subDays($range[1]);
                        return $query->whereBetween('due_date', [$daysAgo, $today]);
                    } else {
                        return Invoice::where('invoice_status', '!=', 'fully paid')->latest();
                    }
                })
            ]);
    }
}
