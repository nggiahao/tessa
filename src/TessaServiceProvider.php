<?php

namespace Nggiahao\Tessa;

use Illuminate\Support\ServiceProvider;

class TessaServiceProvider extends ServiceProvider
{

    public $route_file_path = '/routes/base.php';
    public $custom_route_file_path = '/routes/custom.php';

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->setupRoutes();
        $this->publishFiles();
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadViews();
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
     * Define the routes for the application.
     *
     * @return void
     */
    public function setupRoutes()
    {
        $route = __DIR__.$this->route_file_path;

        $this->loadRoutesFrom($route);
    }

    public function loadViews() {
        $custom_base_folder = resource_path('views/vendor/tessa/base');
        $custom_crud_folder = resource_path('views/vendor/tessa/crud');

        // - first the published/overwritten views (in case they have any changes)
        if (file_exists($custom_base_folder)) {
            $this->loadViewsFrom($custom_base_folder, 'tessa');
        }
        if (file_exists($custom_crud_folder)) {
            $this->loadViewsFrom($custom_crud_folder, 'crud');
        }

        $this->loadViewsFrom(realpath(__DIR__.'/resources/views/base'), 'tessa');
        $this->loadViewsFrom(realpath(__DIR__.'/resources/views/crud'), 'crud');
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
