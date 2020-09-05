<?php

namespace Nggiahao\Tessa;

use Illuminate\Support\ServiceProvider;

class TessaServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {

        $this->publishFiles();
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadConfigs();
        $this->loadHelpers();
    }

    /**
     * Load the Tessa helper methods, for convenience.
     */
    public function loadHelpers()
    {
        require_once __DIR__.'/helpers.php';
    }

    public function loadConfigs()
    {
        // use the vendor configuration file as fallback
        $this->mergeConfigFrom(__DIR__.'/config/tessa/base.php', 'tessa.base');
        $this->mergeConfigFrom(__DIR__.'/config/tessa/crud.php', 'tessa.crud');
    }

    public function publishFiles()
    {
        $tessa_config = [__DIR__.'/config' => config_path()];


        $this->publishes($tessa_config, 'config');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return void
     */
    public function provides()
    {
        //
    }
}
