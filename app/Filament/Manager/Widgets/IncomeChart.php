<?php

namespace App\Filament\Manager\Widgets;

use App\Models\Invoice;
use App\Models\Payment;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class IncomeChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'incomeChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'IncomeChart';

    public ?string $filter = 'today';


    protected static ?int $sort = 3;

    protected function getFilter(): ?string
    {
        return now()->year;
    }
    protected function getFilters(): ?array
    {
        return [
            'today' => 'Today',
            'week' => 'This week',
            'month' => 'This month',
            'year' => 'This year',
        ];
    }



    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        $currentFilter = $this->filter;
        if ($currentFilter === 'today') {
            $data = Trend::model(Payment::class)
                ->between(
                    start: now()->startOfDay(),
                    end: now()->endOfDay()
                )->perHour()->sum('amount');

            $data2 = Trend::model(Invoice::class)
                ->between(
                    start: now()->startOfDay(),
                    end: now()->endOfDay()
                )->perHour()->sum('balance');

            $dataset =  $data->map(fn (TrendValue $value) => $value->aggregate);
            $dataset2 = $data2->map(fn (TrendValue $value) => $value->aggregate);

            $xlabels = $data->map(fn (TrendValue $value) => $value->date);
        } else  if ($currentFilter === 'week') {
            $data = Trend::model(Payment::class)
                ->between(
                    start: now()->startOfWeek(),
                    end: now()->endOfWeek()
                )->perDay()->sum('amount');
            $data2 = Trend::model(Invoice::class)
                ->between(
                    start: now()->startOfWeek(),
                    end: now()->endOfWeek()
                )->perDay()->sum('balance');

            $dataset =  $data->map(fn (TrendValue $value) => $value->aggregate);
            $dataset2 =  $data2->map(fn (TrendValue $value) => $value->aggregate);

            $xlabels = $data->map(fn (TrendValue $value) => $value->date);
        } else if ($currentFilter === 'month') {
            $data = Trend::model(Payment::class)
                ->between(
                    start: now()->startOfMonth(),
                    end: now()->endOfMonth()
                )->perDay()->sum('amount');

            $data2 = Trend::model(Invoice::class)
                ->between(
                    start: now()->startOfDay(),
                    end: now()->endOfDay()
                )->perDay()->sum('balance');

            $dataset =  $data->map(fn (TrendValue $value) => $value->aggregate);
            $dataset2 =  $data2->map(fn (TrendValue $value) => $value->aggregate);

            $xlabels = $data->map(fn (TrendValue $value) => $value->date);
        } else {
            $data = Trend::model(Payment::class)
                ->between(
                    start: now()->startOfYear(),
                    end: now()->endOfYear()
                )->perMonth()->sum('amount');

            $data2 = Trend::model(Invoice::class)
                ->between(
                    start: now()->startOfYear(),
                    end: now()->endOfYear()
                )->perMonth()->sum('balance');

            $dataset =  $data->map(fn (TrendValue $value) => $value->aggregate);
            $dataset2 =  $data2->map(fn (TrendValue $value) => $value->aggregate);

            $xlabels = $data->map(fn (TrendValue $value) => $value->date);
        }

        return [
            'chart' => [
                'type' => 'area',
                'height' => 300,
                'toolbar' => [
                    'show' => false,
                ],
            ],
            'series' => [
                [
                    'name' => 'Income',
                    'data' => $dataset,
                    'type' => 'area',
                ],
                [
                    'name' => 'Balances',
                    'data' => $dataset2,
                    'type' => 'area',
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
                'gradient' => [
                    'shade' => 'dark',
                    'type' => 'vertical',
                    'shadeIntensity' => 0.5,
                    'gradientToColors' => ['#16A34A'],
                    'inverseColors' => true,
                    'opacityFrom' => 0.7,
                    'opacityTo' => 0.7,
                    'stops' => [0, 100],
                ],
            ],
            'plotOptions' => [
                'bar' => [
                    'borderRadius' => 10,
                ],
            ],
        ];
    }
}
