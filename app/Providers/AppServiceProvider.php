<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use JohnLobo\ThemeBuilder\ThemeBuilder;
use Shipu\Themevel\Contracts\ThemeContract;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(ThemeContract::class, function(){
            return new ThemeBuilder($this->app,$this->app['view']->getFinder(), $this->app['config'], $this->app['translator']);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
