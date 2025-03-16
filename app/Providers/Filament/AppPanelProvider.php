<?php

namespace App\Providers\Filament;

use Althinect\FilamentSpatieRolesPermissions\FilamentSpatieRolesPermissionsPlugin;
use Filament\FontProviders\GoogleFontProvider;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AppPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('app')
            ->path('app')
            ->login()
            ->registration()
            ->passwordReset()
            ->emailVerification()
            ->colors([
                'primary' => '#3b82f6',
            ])
            ->font('DM Sans', provider: GoogleFontProvider::class)
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
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
            ])
            // ->brandLogo(asset('assets/img/aurora_logo_main.png'))
            // ->darkModeBrandLogo(asset('assets/img/aurora_logo_inverted.png'))
            // ->brandLogoHeight('2.25rem')
            // ->favicon(asset('assets/img/favicon/favicon.ico'))
            ->sidebarCollapsibleOnDesktop()
            ->navigationGroups([
                NavigationGroup::make()
                    ->label('Dashboards')
                    ->icon(asset('assets/icons/app.png')),
                NavigationGroup::make()
                    ->label('Course Management')
                    ->icon(asset('assets/icons/users.png')),
                NavigationGroup::make()
                    ->label('User Management')
                    ->icon(asset('assets/icons/users.png')),
                NavigationGroup::make()
                    ->label('Announcements')
                    ->icon(asset('assets/icons/megaphone.png')),
                NavigationGroup::make()
                    ->label('Roles and Permissions')
                    ->icon(asset('assets/icons/lock.png')),
            ])
            ->plugins([
                FilamentSpatieRolesPermissionsPlugin::make(),
                // ActivitylogPlugin::make()
                //     ->navigationCountBadge(true)
                //     ->navigationGroup('Settings')
                //     ->navigationSort(2),
                // \TomatoPHP\FilamentApi\FilamentAPIPlugin::make(),
                // GlobalSearchModalPlugin::make()
                //     ->closeButton(enabled: true)
                //     ->associateItemsWithTheirGroups(),
                // FilamentApexChartsPlugin::make(),
                // FilamentEditProfilePlugin::make()
                //     ->slug('my-profile')
                //     ->shouldRegisterNavigation(false)
                //     ->shouldShowDeleteAccountForm(false)
                //     ->shouldShowSanctumTokens()
                //     ->shouldShowBrowserSessionsForm()
                //     ->shouldShowAvatarForm(),
            ])
            ->userMenuItems([
                // 'profile' => MenuItem::make()
                //     ->label(fn() => auth()->user()->name)
                //     ->url(fn(): string => EditProfilePage::getUrl())
                //     ->icon('heroicon-m-user-circle'),
            ]);
    }
}
