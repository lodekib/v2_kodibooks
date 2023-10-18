<?php

namespace App\Filament\Manager\Pages;

use Filament\Pages\Dashboard as BasePage;
use JibayMcs\FilamentTour\Tour\HasTour;
use JibayMcs\FilamentTour\Tour\Step;
use JibayMcs\FilamentTour\Tour\Tour;



class ManagerDashboard extends BasePage
{
    use HasTour;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-s-bars-3';
    }



    public function tours(): array
    {
        return [
            Tour::make('dashboard')->route('filament.manager.pages.manager-dashboard')
                ->steps(
                    Step::make('dashboard')->title('Welcome to Kodibooks !')->description('Lets get some walkthroughs to get you started')->icon('heroicon-s-cake')->iconColor('primary')->uncloseable(),
                    Step::make('li.fi-sidebar-group:nth-of-type(2) .fi-sidebar-item:nth-of-type(1)')->title('Properties')->description('<p>Your first step is to add properties from this area.<br>Properties can also be managed here</p>')->icon('heroicon-s-building-office-2')->iconColor('success')->uncloseable(),
                    Step::make('li.fi-sidebar-group:nth-of-type(2) .fi-sidebar-item:nth-of-type(3)')->title('Units')->description('<p>After adding the properties, you can attach units<br>to the properties here')->icon('heroicon-s-cube')->iconColor('success')->uncloseable(),
                    Step::make('li.fi-sidebar-group:nth-of-type(2) .fi-sidebar-item:nth-of-type(2)')->title('Tenants')->description('<p>Add and manage tenants profiles from this section</p>')->icon('heroicon-s-users')->iconColor('success')->uncloseable(),
                    Step::make('li.fi-sidebar-group:nth-of-type(3)')->title('Payments')->description('<p>View the payments, invoices and allocations made from this section')->icon('heroicon-o-credit-card')->iconColor('success')->uncloseable(),
                    Step::make('dashboard')->title('Verification')->description('We would like to know more about your organization')->uncloseable()->dispatchOnNext('open-modal', id: 'biodata'),
                )->alwaysShow(fn (): bool => auth()->check() && auth()->user()->is_verified ? true : false)->ignoreRoutes()->doneButtonLabel('Verify')->disableEvents()
        ];
    }
}
