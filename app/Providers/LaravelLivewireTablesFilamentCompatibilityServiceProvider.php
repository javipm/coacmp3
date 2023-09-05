<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\ComponentHookRegistry;
use Rappasoft\LaravelLivewireTables\Features\AutoInjectRappasoftAssets;
use Rappasoft\LaravelLivewireTables\Mechanisms\RappasoftFrontendAssets;

class LaravelLivewireTablesFilamentCompatibilityServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        (new RappasoftFrontendAssets)->boot();
        app('livewire')->componentHook(AutoInjectRappasoftAssets::class);

        //Remove for compatibility with Filament
        // ComponentHookRegistry::boot();

        //Fix translations JSON
        $this->loadJsonTranslationsFrom(__DIR__.'/../../vendor/rappasoft/laravel-livewire-tables/resources/lang', 'livewire-tables');
    }

    public function register(): void
    {
        (new RappasoftFrontendAssets)->register();
    }
}
