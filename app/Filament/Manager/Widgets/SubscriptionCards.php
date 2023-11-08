<?php

namespace App\Filament\Manager\Widgets;

use Filament\Widgets\Widget;

class SubscriptionCards extends Widget
{
    protected static string $view = 'filament.manager.widgets.subscription-cards';
    protected int | string | array $columnSpan = 'full';
}
