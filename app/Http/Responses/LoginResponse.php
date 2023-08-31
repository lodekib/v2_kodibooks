<?php

namespace App\Http\Responses;

use Filament\Facades\Filament;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Livewire\Features\SupportRedirects\Redirector;

class LoginResponse extends \Filament\Http\Responses\Auth\LoginResponse
{
    public function toResponse($request): RedirectResponse|Redirector
    {
        if (Auth::user()->hasRole('Manager')) {
            return redirect()->route('filament.manager.pages.manager-dashboard');
        } else if (Auth::user()->hasRole('Super Admin')) {
            return redirect()->route('filament.admin.pages.dashboard');
        }

        return parent::toResponse($request);
    }
}
