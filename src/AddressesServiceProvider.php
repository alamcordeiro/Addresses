<?php

namespace Laralum\Addresses;

use Illuminate\Support\ServiceProvider;

class AddressesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->loadTranslationsFrom(__DIR__.'/Translations', 'laralum_addresses');

        $this->loadMigrationsFrom(__DIR__.'/Migrations');

    }

    /**
     * I cheated this comes from the AuthServiceProvider extended by the App\Providers\AuthServiceProvider.
     *
     * Register the application's policies.
     *
     * @return void
     */
    public function registerPolicies()
    {
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
