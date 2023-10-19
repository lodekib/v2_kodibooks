<?php

namespace App\Providers\Filament;

use App\Filament\AvatarProviders\BoringAvatarsProvider;
use App\Filament\Manager\Pages\ManagerDashboard;
use App\Filament\Manager\Widgets\ExpenseChart;
use App\Filament\Manager\Widgets\IncomeChart;
use App\Filament\Manager\Widgets\LatestPayments;
use App\Filament\Manager\Widgets\PendingInvoices;
use App\Filament\Manager\Widgets\StatsOverview;
use App\Http\Middleware\CheckRole;
use Closure;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use JibayMcs\FilamentTour\FilamentTourPlugin;
use Saade\FilamentFullCalendar\FilamentFullCalendarPlugin;


class ManagerPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('manager')->spa()
            ->path('')->sidebarCollapsibleOnDesktop()
            ->collapsedSidebarWidth('80px')->sidebarWidth('220px')
            ->login()->passwordReset()->registration()
            ->colors([
                'primary' => Color::hex('#4ade80'),
            ])->favicon(asset('assets/kodibooks.png'))
            ->discoverResources(in: app_path('Filament/Manager/Resources'), for: 'App\\Filament\\Manager\\Resources')
            ->discoverPages(in: app_path('Filament/Manager/Pages'), for: 'App\\Filament\\Manager\\Pages')
            ->pages([
                ManagerDashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Manager/Widgets'), for: 'App\\Filament\\Manager\\Widgets')
            ->widgets([
                ExpenseChart::class,
                IncomeChart::class,
                LatestPayments::class,
                PendingInvoices::class,
                StatsOverview::class
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])->navigationGroups([
                'Assets', 'Payments','Invoices', 'Expenses', 'Utilities', 'Settings',
            ])
            ->plugins([
                BreezyCore::make()->myProfile(
                    shouldRegisterUserMenu: true,
                    shouldRegisterNavigation: true,
                    hasAvatars: true
                )->enableTwoFactorAuthentication(force: false),
                FilamentTourPlugin::make(),
                FilamentFullCalendarPlugin::make()
                ->selectable()
                ->timezone('Africa/Nairobi')->editable(true)
            ]);
    }
}
