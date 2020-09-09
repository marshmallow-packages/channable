<?php

namespace Marshmallow\Channels\Channable;

use Illuminate\Support\ServiceProvider;
use Marshmallow\Channels\Channable\Channable;

class ChannableServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->mergeConfigFrom(
            __DIR__.'/../config/channable.php',
            'channable'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    	$this->app->singleton(Channable::class, function () {
            return new Channable();
        });

        $this->app->alias(Channable::class, 'channable');
        /**
         * Views
         */
        // $this->loadViewsFrom(__DIR__.'/views', 'marshmallow');

        $this->loadFactoriesFrom(__DIR__.'/../database/factories');

        $this->publishes([
            // __DIR__.'/views' => resource_path('views/vendor/marshmallow'),
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                // InstallCommand::class,
            ]);
        }
    }
}
