<?php

namespace App\Providers;

use App\Policies\MediaPolicy;
use App\Policies\FolderPolicy;
use Illuminate\Foundation\Vite;
use App\Policies\ActivityPolicy;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Spatie\Activitylog\Models\Activity;
use Filament\Support\Facades\FilamentView;
use Juniyasyos\FilamentMediaManager\Models\Media;
use Juniyasyos\FilamentMediaManager\Models\Folder;

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
        Gate::policy(Activity::class, ActivityPolicy::class);
        Gate::policy(Folder::class, FolderPolicy::class);
        Gate::policy(Media::class, MediaPolicy::class);

        Event::listen(function (\SocialiteProviders\Manager\SocialiteWasCalled $event) {
            $event->extendSocialite('discord', \SocialiteProviders\Google\Provider::class);
        });

        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'organization-structure');

        // app(Vite::class)->prefetch([
        //     'resources/js/app.js',
        //     'resources/css/app.css',
        //     'resources/css/filament/admin/theme.css',
        // ]);

        // // Ngrok For Development
        // if (config('app.env') === 'local') {
        //     URL::forceScheme('https');
        // }
    }
}
