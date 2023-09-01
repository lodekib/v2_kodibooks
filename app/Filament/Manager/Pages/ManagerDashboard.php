<?php

namespace App\Filament\Manager\Pages;

use Filament\Pages\Dashboard as BasePage;
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
            Tour::make('dashboard')
                ->steps(
                    Step::make()
                        ->title('Welcome to Kodibooks !')->description('Your one stop solution for tenant management !.Lets get some walkthroughs to get you started')
                        ->icon('heroicon-s-cake')->iconColor('primary')->uncloseable(),
                    Step::make('.fi-avatar')
                        ->title('Account ')->description('dummy description')
                        // ->description(view('livewire.biodata'))
                        ->icon('heroicon-s-user-circle')->iconColor('primary')->uncloseable()
                )
        ];
    }
}
