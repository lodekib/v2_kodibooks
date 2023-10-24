<?php

namespace App\Providers;

use App\Http\Middleware\SubscriptionMiddlware;
use Closure;
use Filament\Billing\Providers\Contracts\Provider;
use Illuminate\Http\RedirectResponse;

class BillingProvider implements Provider
{
    public function getRouteAction(): string | Closure
    {
        return function (): void {
        };
    }

    public function getSubscribedMiddleware(): string
    {
        return SubscriptionMiddlware::class;
    }
}
