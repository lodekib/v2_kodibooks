<?php

namespace App\Filament\Manager\Pages;

use Filament\Pages\Dashboard as BasePage;
use Illuminate\Support\Facades\Auth;
use JibayMcs\FilamentTour\Highlight\HasHighlight;
use JibayMcs\FilamentTour\Highlight\Highlight;
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
                    Step::make()
                        ->title('Welcome to Kodibooks !')->description('Your one stop solution for tenant management !.Lets get some walkthroughs to get you started')
                        ->icon('heroicon-s-cake')->iconColor('primary')->uncloseable(),
                    Step::make('dashboard')
                        ->title('')
                        ->description(view('filament.manager.biodata.biodata'))->uncloseable()
                        ->dispatchOnNext('open-modal', id: 'biodata'),
                    Step::make()
                        ->title('Test !')->description('Your End')
                        ->icon('heroicon-s-cake')->iconColor('primary')->uncloseable(),
                )->alwaysShow(false)->ignoreRoutes()
        ];
    }
}
