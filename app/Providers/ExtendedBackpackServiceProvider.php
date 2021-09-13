<?php

namespace App\Providers;

use Backpack\CRUD\BackpackServiceProvider;

use Illuminate\Support\ServiceProvider;

class ExtendedBackpackServiceProvider extends BackpackServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(\Illuminate\Routing\Router $router)
    {
        $this->loadViewsWithFallbacks();
        $this->loadTranslationsFrom(realpath(__DIR__.'/resources/lang'), 'backpack');
        $this->loadConfigs();
        $this->registerMiddlewareGroup($this->app->router);
        $this->setupRoutes($this->app->router);
        $this->setupCustomRoutes($this->app->router);
        $this->publishFiles();
    }



}
