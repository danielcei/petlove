<?php

namespace App\Providers;

use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Support\ServiceProvider;

class FilamentScriptsProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        FilamentAsset::register([
            Js::make('pet-actions', __DIR__.'/../../resources/js/filament/pet-actions.js'),
        ]);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
