<?php

namespace App\Filament\Partner\Pages;

use Filament\Pages\Dashboard;
use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;

class PartnerDashboard extends Dashboard
{
    public function getTitle(): string|Htmlable
    {
        return 'Partners Area';
    }
}
