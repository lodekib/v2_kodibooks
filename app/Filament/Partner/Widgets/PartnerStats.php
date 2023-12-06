<?php

namespace App\Filament\Partner\Widgets;

use App\Models\Partner;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PartnerStats extends BaseWidget
{
    protected static ?int $sort = 1;
    protected int | string | array $columnSpan = '';
    public $code;

    public function mount()
    {
        $p_code = Partner::find(auth()->id())->reg_code;
        $this->code = $p_code;
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Clients Referred', number_format(User::where('code',$this->code)->count()))
                ->description('')
                ->descriptionIcon('heroicon-m-arrow-trending-up'),
            Stat::make('Total Amount', 'KES 0')
                ->description('')
                ->descriptionIcon('heroicon-m-arrow-trending-up'),
        ];
    }
}
