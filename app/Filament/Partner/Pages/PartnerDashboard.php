<?php

namespace App\Filament\Partner\Pages;

use App\Filament\Partner\Widgets\ReferralWidget;
use Filament\Pages\Dashboard;
use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;

class PartnerDashboard extends Dashboard
{

    protected static string $routePath = '/dashboard';

    public function getTitle(): string|Htmlable
    {
        return 'Partners Area';
    }

    
    public function getWidgets(): array
    {
        return [
            ReferralWidget::class
        ];
    }
}
