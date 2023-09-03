<?php

namespace App\Filament\Manager\Widgets;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use App\Models\Property;
use App\Models\Expense;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class ExpenseChart extends ApexChartWidget
{
    
    protected static ?string $pollingInterval = '10s';
    protected static ?int $sort = 4;
    protected static string $chartId = 'expenses';
    protected static ?string $heading = 'Expenses ';



    /**
     * Filter Options
     *
     * @return array|null
     */
    protected function getFilters(): ?array
    {
        return Property::pluck('property_name', 'property_name')->toArray();
    }

    protected function getOptions(): array
    {

        $currentFilter = $this->filter;

        $data = Trend::query(Expense::where('property_name',$currentFilter))->between(
            start: now()->startOfMonth(),
            end: now()->endOfMonth()
        )->perDay()->sum('amount');
        $xlabels = $data->map(fn (TrendValue $value) => $value->date);

        $dataset = $data->map(fn(TrendValue $value) => $value->aggregate);

        return [
            'chart' => [
                'type' => 'line',
                'height' => 300,
                'toolbar' => [
                    'show' => false,
                ],
            ],
            'series' => [
                [
                    'name' => 'Income',
                    'data' => $dataset,
                    'type' => 'column',
                ],
            ],
            'stroke' => [
                'width' => [0, 1],
                'curve' => 'smooth',
            ],
            'xaxis' => [
                'categories' => $xlabels,
                'labels' => [
                    'style' => [
                        'colors' => '#16A34A',
                        'fontWeight' => 600,
                    ],
                ],
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'colors' => '#16A34A',
                        'fontWeight' => 600,
                    ],
                ],
            ],
            'legend' => [
                'labels' => [
                    'colors' => '#16A34A',
                    'fontWeight' => 600,
                ],
            ],
            'colors' => ['#16A34A', '#ffa500'],
            'fill' => [
                'type' => 'gradient',
                // 'gradient' => [
                //     'shade' => 'dark',
                //     'type' => 'vertical',
                //     'shadeIntensity' => 0.5,
                //     'gradientToColors' => ['#d946ef'],
                //     'inverseColors' => true,
                //     'opacityFrom' => 1,
                //     'opacityTo' => 1,
                //     'stops' => [0, 100],
                // ],
            ],
            'plotOptions' => [
                'bar' => [
                    'borderRadius' => 10,
                ],
            ],
        ];
    }
}
