<?php

namespace JohnLobo\ThemeBuilder;

use Illuminate\Support\ServiceProvider;
use Shipu\Themevel\Contracts\ThemeContract;

class ThemeBuilderServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'johnlobo');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'johnlobo');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/themebuilder.php', 'themebuilder');

        // Register the service the package provides.
       /* $this->app->singleton('themebuilder', function ($app) {
            return new ThemeBuilder;
        });*/

       /* $this->app->bind(ThemeContract::class, function(){
            return new ThemeBuilder($this->app,$this->app['view']->getFinder(), $this->app['config'], $this->app['translator']);
        });*/


    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['themebuilder'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/themebuilder.php' => config_path('themebuilder.php'),
        ], 'themebuilder.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/johnlobo'),
        ], 'themebuilder.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/johnlobo'),
        ], 'themebuilder.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/johnlobo'),
        ], 'themebuilder.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
