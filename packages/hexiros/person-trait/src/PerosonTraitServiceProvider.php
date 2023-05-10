<?php

namespace Hexiros\PersonTrait;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;

class PerosonTraitServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->make('Hexiros\PersonTrait\Http\Controllers\PersonController');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if (!$this->app->routesAreCached()) {
            require __DIR__ . '/../routes/api.php';
        }
    }
}
