<?php

namespace App\Providers;


use App\Services\Docs;
use App\Services\DocsRouteService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {


        $this->app->singleton('docs', function () {
            return new Docs();
        });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Livewire\Livewire::forceAssetInjection();
    }
}
