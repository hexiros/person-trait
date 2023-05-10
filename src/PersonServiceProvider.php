<?php

namespace Hexiros\PersonTrait;

use Illuminate\Support\Collection;
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
                __DIR__.'/database/migrations' => $this->getMigrationFileName('create_person_info_table.php'),
            ], 'person-trait-migrations');
        }
    }

    /**
     * Returns existing migration file if found, else uses the current timestamp.
     * Thanks to spatie/laravel-permission
     */
    protected function getMigrationFileName(string $migrationFileName): string
    {
        $timestamp = date('Y_m_d_His');

        $filesystem = $this->app->make(Filesystem::class);

        return Collection::make([$this->app->databasePath().DIRECTORY_SEPARATOR.'migrations'.DIRECTORY_SEPARATOR])
            ->flatMap(fn ($path) => $filesystem->glob($path.'*_'.$migrationFileName))
            ->push($this->app->databasePath()."/migrations/{$timestamp}_{$migrationFileName}")
            ->first();
    }
}