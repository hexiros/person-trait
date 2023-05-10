<?php

namespace Hexiros\PersonTrait;

use Illuminate\Support\ServiceProvider;

class PersonServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        // Register an observer to automatically add the PersonTrait to any models that use it
        foreach ($this->app->make('config')->get('person.models', []) as $model) {
            $model::observe(PersonTraitObserver::class);
        }

        // Load migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/person.php',
            'person'
        );
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    public function bootForPublishing()
    {
        $this->registerPublishing();
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../database/migrations' => database_path('migrations'),
            ], 'person-trait-migrations');
        }
    }
}