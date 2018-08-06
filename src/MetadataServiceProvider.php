<?php

namespace WATR\Metadata;

use Illuminate\Support\ServiceProvider;

/**
 * Class MetadataServiceProvider.
 */
class MetadataServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            //
        }
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
}
