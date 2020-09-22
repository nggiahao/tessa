<?php

namespace Nggiahao\Tessa;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Nggiahao\Tessa\app\Http\Middleware\Authenticate;

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
        $this->loadConfigs();
        $this->pushMiddleware();
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

        app()->config['auth.providers'] = app()->config['auth.providers'] +
            [
                'admin' => [
                    'driver'  => 'eloquent',
                    'model'   => \App\User::class,
                ],
            ];

        // add the backpack_users password broker to the configuration
        app()->config['auth.passwords'] = app()->config['auth.passwords'] +
            [
                'admin' => [
                    'provider'  => 'admin',
                    'table'     => 'password_resets',
                    'expire'    => 240,
                ],
            ];

        // add the backpack_users guard to the configuration
        app()->config['auth.guards'] = app()->config['auth.guards'] +
            [
                'admin' => [
                    'driver'   => 'session',
                    'provider' => 'admin',
                ],
            ];
    }

    public function publishFiles()
    {
        $tessa_config = [__DIR__.'/config' => config_path()];

        $tessa_public = [__DIR__.'/public' => public_path()];

        $this->publishes($tessa_config, 'config');
        $this->publishes($tessa_public, 'public');
    }


    public function pushMiddleware()
    {
        $router = $this->app->make(Router::class);
        $router->pushMiddlewareToGroup('auth.admin', Authenticate::class);
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
