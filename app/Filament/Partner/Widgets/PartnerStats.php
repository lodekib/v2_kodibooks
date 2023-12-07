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
    public $commision;
    public function mount()
    {
        $partner = Partner::find(auth()->id());
        $this->code = $partner->reg_code;
        $this->commision = $partner->commision;
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Clients Referred', number_format(User::where('code', $this->code)->count()))
                ->description('')
                ->descriptionIcon('heroicon-m-arrow-trending-up'),
            Stat::make('Commision', $this->commision . '%')
                ->description(''),
            Stat::make('Total Withdrawable', 'KES ' .number_format(0))
                ->description('')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->extraAttributes([
                    'wire:click' => "@php echo 'tests' @endphp "
                ]),
        ];
    }
}
