<?php

namespace App\Providers\Filament;

use App\Filament\AvatarProviders\BoringAvatarsProvider;
use App\Filament\Manager\Pages\ClientArea;
use App\Filament\Manager\Pages\ManagerDashboard;
use App\Filament\Manager\Widgets\ExpenseChart;
use App\Filament\Manager\Widgets\IncomeChart;
use App\Filament\Manager\Widgets\LatestPayments;
use App\Filament\Manager\Widgets\PendingInvoices;
use App\Filament\Manager\Widgets\StatsOverview;
use App\Http\Middleware\CheckRole;
use App\Http\Middleware\PaymentMiddleware;
use App\Http\Middleware\SubscriptionMiddleware;
use App\Providers\BillingProvider;
use App\Services\ExampleBillingProvider;
use Closure;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
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
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use Jeffgreco13\FilamentBreezy\Pages\MyProfilePage;
use JibayMcs\FilamentTour\FilamentTourPlugin;
use Livewire\Livewire;
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
            ->widgets([])
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
                SubscriptionMiddleware::class
            ])
            ->authMiddleware([
                Authenticate::class,
            ])->userMenuItems([
                'Client Area' => MenuItem::make()->label('Client Area')->icon('heroicon-s-user-group')->url(fn():string => ClientArea::getUrl()),
                'Profile' =>MenuItem::make()->label('Profile')->icon('heroicon-s-cog')->url(fn():string => MyProfilePage::getUrl())
            ])
            ->navigationGroups([
                NavigationGroup::make()
                    ->label('Assets')
                    ->icon('heroicon-s-cube-transparent'),
                NavigationGroup::make()
                    ->label('Payments')
                    ->icon('heroicon-s-currency-dollar'),
                NavigationGroup::make()
                    ->label('Invoices')
                    ->icon('heroicon-s-clipboard-document-list'),
                NavigationGroup::make()
                    ->label('Expenses')
                    ->icon('heroicon-s-banknotes'),
                NavigationGroup::make()
                    ->label('Utilities')
                    ->icon('heroicon-s-funnel'),
                NavigationGroup::make()
                    ->label('Settings')
                    ->icon('heroicon-s-cog'),
                NavigationGroup::make()
                    ->label('Archives')
                    ->icon('heroicon-s-archive-box'),
            ])->renderHook(
                'panels::content.start',
                function (): string {
                    return Blade::render('@livewire(\'biodata\')');
                },
            )
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
