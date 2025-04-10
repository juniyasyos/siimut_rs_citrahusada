<?php

namespace App\Providers;

use App\Policies\MediaPolicy;
use App\Policies\FolderPolicy;
use Filament\Facades\Filament;
use Illuminate\Foundation\Vite;
use App\Policies\ActivityPolicy;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Spatie\Activitylog\Models\Activity;
use Filament\Support\Facades\FilamentView;
use Rmsramos\Activitylog\ActivitylogPlugin;
use Juniyasyos\FilamentMediaManager\Models\Media;
use Juniyasyos\FilamentMediaManager\Models\Folder;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use BezhanSalleh\FilamentLanguageSwitch\Enums\Placement;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        FilamentView::registerRenderHook(
            'panels::body.end',
            fn(): string =>
            Blade::render("@vite('resources/js/app.js')")
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // collect(glob(app_path('Models') . '/*.php'))
        //     ->map(fn($file) => [
        //         'model' => "App\\Models\\" . pathinfo($file, PATHINFO_FILENAME),
        //         'policy' => "App\\Policies\\" . pathinfo($file, PATHINFO_FILENAME) . "Policy"
        //     ])
        //     ->each(
        //         fn($item) => class_exists($item['model']) && class_exists($item['policy'])
        //         ? Gate::policy($item['model'], $item['policy'])
        //         : null
        //     );

        Gate::policy(Activity::class, ActivityPolicy::class);
        Gate::policy(Folder::class, FolderPolicy::class);
        Gate::policy(Media::class, MediaPolicy::class);

        Event::listen(function (\SocialiteProviders\Manager\SocialiteWasCalled $event) {
            $event->extendSocialite('discord', \SocialiteProviders\Google\Provider::class);
        });

        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'indikator-mutu');
        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'filament-navigation');
        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'filament-actions');

        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['id', 'en']) // also accepts a closure
                ->outsidePanelPlacement(Placement::BottomRight);
        });

        // $loader = app('translator')->getLoader();
        // $registeredLangs = $loader->namespaces();

        // dd($registeredLangs);
        // app(Vite::class)->prefetch([
        //     'resources/js/app.js',
        //     'resources/css/app.css',
        //     'resources/css/filament/admin/theme.css',
        // ]);

        // Ngrok For Development
        if (config('app.env') === 'production' && config('DEBUGBAR_ENABLED') === 'false') {
            URL::forceScheme('https');
        }
    }
}
