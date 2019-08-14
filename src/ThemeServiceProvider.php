<?php

namespace Enigma\Theme;

use Illuminate\Support\ServiceProvider;

class ThemeServiceProvider extends ServiceProvider
{

    protected $commands = [];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerWebRoutes();
        $this->registerHelpers();

        //$this->app->make('Enigma\Theme\Theme');
        
        $this->publishes([
            __DIR__.'/publishable/config/enigma' => config_path('enigma')
        ]);
        
        $this->loadViewsFrom(resource_path('views/'.config('enigma.theme.name', 'default')), 'theme');
        $this->loadViewsFrom(__DIR__.'/publishable/views', 'theme.page');
        $this->publishes([
            __DIR__.'/publishable/views' => resource_path('views/vendor/theme'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/publishable/config/enigma/theme.php', 'enigma.theme'
        );
        $this->app->bind('theme', function() {
            return new Theme;
        });
        //$this->app->alias('theme', Theme::class);
        //$this->commands($this->commands);
    }

    private function registerWebRoutes()
    {
        if (file_exists($file = __DIR__.'/routes/web.php'))
        {
            $this->loadRoutesFrom($file);
        }
        
        /*if (!$this->app->routesAreCached()) {
            require __DIR__.'/routes/web.php';
        }*/
    }

    private function registerHelpers()
    {
        if (file_exists($file = __DIR__.'/Helpers.php'))
        {
            require_once($file);
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['theme', ThemeController::class];
    }
}
