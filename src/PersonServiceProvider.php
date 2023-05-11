<?php

namespace Hexiros\PersonTrait\Providers;

use Illuminate\Support\ServiceProvider;

class PersonServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->registerPublishing();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    private function registerPublishing()
    {
        $this->publishes([
            __DIR__.'/../database/migrations/create_person_info_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_person_info_table.php'),
        ], 'person-trait-migration');
    }
}