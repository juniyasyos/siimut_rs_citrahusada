<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use App\Models\User;
use Filament\PanelProvider;
use App\Filament\Pages\Login;
use App\Settings\KaidoSetting;
use Filament\Facades\Filament;
use Filament\Support\Colors\Color;
use Illuminate\Support\Facades\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Http\Middleware\Authenticate;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use Rmsramos\Activitylog\ActivitylogPlugin;
use Juniyasyos\FilamentPWA\FilamentPWAPlugin;
use Hasnayeen\Themes\Http\Middleware\SetTheme;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use DutchCodingCompany\FilamentSocialite\Provider;
use Juniyasyos\DashStackTheme\DashStackThemePlugin;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use CharrafiMed\GlobalSearchModal\GlobalSearchModalPlugin;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Leandrocfe\FilamentApexCharts\FilamentApexChartsPlugin;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Juniyasyos\FilamentMediaManager\FilamentMediaManagerPlugin;
use App\Filament\Resources\UnitKerjaResource\Widgets\Bencmarking;
use DutchCodingCompany\FilamentSocialite\FilamentSocialitePlugin;
use Juniyasyos\FilamentLaravelBackup\FilamentLaravelBackupPlugin;

class AdminPanelProvider extends PanelProvider
{
    private ?KaidoSetting $settings = null;

    public function __construct()
    {
        //this is feels bad but this is the solution that i can think for now :D
        // Check if settings table exists first
        try {
            if (Schema::hasTable('settings')) {
                $this->settings = app(KaidoSetting::class);
            }
        } catch (\Exception $e) {
            $this->settings = null;
        }
    }

    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('')
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->when($this->settings->login_enabled ?? true, fn($panel) => $panel->login(Login::class))
            ->when($this->settings->registration_enabled ?? true, fn($panel) => $panel->registration())
            ->when($this->settings->password_reset_enabled ?? true, fn($panel) => $panel->passwordReset())
            ->emailVerification()
            ->globalSearch()
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                // Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
                // Bencmarking::class
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
            ->sidebarCollapsibleOnDesktop(true)
            ->authMiddleware([
                Authenticate::class,
            ])
            ->middleware([
                SetTheme::class
            ])
            ->navigationGroups([
                'User & Access Control',
                'Quality Indicators',
                'System & Configurations'
            ])
            ->plugins(
                $this->getPlugins()
            )
            ->databaseNotifications();
    }

    private function getPlugins(): array
    {
        $plugins = [
            FilamentApexChartsPlugin::make(),
            DashStackThemePlugin::make(),
            FilamentShieldPlugin::make(),
            FilamentPWAPlugin::make(),
            FilamentMediaManagerPlugin::make()->allowUserAccess()->allowSubFolders(),
            FilamentLaravelBackupPlugin::make(),
            // ApiServicePlugin::make(),
            ActivitylogPlugin::make()
                ->navigationIcon('heroicon-o-clock')
                ->navigationItem()
                ->navigationGroup('User & Access Control')
                ->label('Audit & Activity Logs'),
            GlobalSearchModalPlugin::make()
                ->SwappableOnMobile(enabled: false)
                ->localStorageMaxItemsAllowed(20)
                ->RetainRecentIfFavorite(true)
                ->placeholder('Type to search...'),
            BreezyCore::make()
                ->myProfile(
                    shouldRegisterUserMenu: true,
                    shouldRegisterNavigation: false,
                    navigationGroup: __('System & Configuration'),
                    hasAvatars: true,
                    slug: 'my-profile'
                )
                ->avatarUploadComponent(fn($fileUpload) => $fileUpload->disableLabel())
                ->avatarUploadComponent(
                    fn() => FileUpload::make('avatar_url')
                        ->image()
                        ->disk('public')
                )
                ->enableTwoFactorAuthentication(),
        ];

        if ($this->settings->sso_enabled ?? true) {
            $plugins[] =
                FilamentSocialitePlugin::make()
                    ->providers([
                        Provider::make('google')
                            ->label('Google')
                            ->icon('fab-google')
                            ->color(Color::hex('#2f2a6b'))
                            ->outlined(true)
                            ->stateless(false)
                    ])->registration(true)
                    ->createUserUsing(function (string $provider, SocialiteUserContract $oauthUser, FilamentSocialitePlugin $plugin) {
                        $user = User::firstOrNew([
                            'email' => $oauthUser->getEmail(),
                        ]);
                        $user->name = $oauthUser->getName();
                        $user->email = $oauthUser->getEmail();
                        $user->email_verified_at = now();
                        $user->save();

                        return $user;
                    });
        }
        return $plugins;
    }
}
