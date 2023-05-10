<?php

namespace Hexiros\PersonTrait;

use Illuminate\Support\ServiceProvider;

class PersonServiceProvider extends ServiceProvider {
    public function boot()
    {
        // Register an observer to automatically add the PersonTrait to any models that use it
        foreach ($this->app->make('config')->get('person.models', []) as $model) {
            $model::observe(PersonTraitObserver::class);
        }

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}