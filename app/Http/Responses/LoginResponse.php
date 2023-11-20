<?php

namespace App\Http\Responses;

use Filament\Facades\Filament;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Livewire\Features\SupportRedirects\Redirector;
use Bpuig\Subby\Models\Plan;

class LoginResponse extends \Filament\Http\Responses\Auth\LoginResponse
{
    public function toResponse($request): RedirectResponse|Redirector
    {
        $user = Auth::user();
        $plan = Plan::getByTag('Basic');
        if ($user->hasRole('Partner')) {
            return redirect()->route('filament.partner.pages.dashboard');
        } else {
            if ($user->hasRole('Manager')) {
                if ($plan != null && ($user->subscriptions)->isEmpty()) {
                    $user->newSubscription('primary', $plan, 'Primary Subscription', 'Client primary subscription', null, 'mpesa');
                }
                return redirect()->route('filament.manager.pages.manager-dashboard');
            } else if ($user->hasRole('Super Admin')) {
                return redirect()->route('filament.admin.pages.dashboard');
            }
        }

        return parent::toResponse($request);
    }
}
