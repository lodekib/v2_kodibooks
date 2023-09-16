<?php

namespace App\Providers\Filament;

use App\Filament\AvatarProviders\BoringAvatarsProvider;
use App\Filament\Manager\Pages\ManagerDashboard;
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
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use JibayMcs\FilamentTour\FilamentTourPlugin;

class ManagerPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('manager')->spa()
            ->path('')->sidebarCollapsibleOnDesktop()
            ->collapsedSidebarWidth('80px')
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
                // Widgets\AccountWidget::class,
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
                'Assets', 'Payments', 'Expenses', 'Utilities', 'Settings',
            ])->navigationItems([
                NavigationItem::make('Old tenants')
                    ->url('')
                    ->icon('heroicon-s-user-minus')
                    ->group('Archives')->isActiveWhen(fn () => request()->routeIs(''))
                    ->sort(3),
                NavigationItem::make('Stale Invoices')
                    ->url('')
                    ->icon('heroicon-s-archive-box')
                    ->group('Archives')->isActiveWhen(fn () => request()->routeIs(''))
                    ->sort(3),
                NavigationItem::make('Past Payments')
                    ->url('')
                    ->icon('heroicon-s-document-minus')
                    ->group('Archives')->isActiveWhen(fn () => request()->routeIs(''))
                    ->sort(3),
            ])
            ->plugins([
                BreezyCore::make()->myProfile(
                    shouldRegisterUserMenu: true,
                    shouldRegisterNavigation: true,
                    hasAvatars: true
                )->enableTwoFactorAuthentication(force: false),
                FilamentTourPlugin::make()
            ]);
    }
}
