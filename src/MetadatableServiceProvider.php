<?php

namespace WATR\Metadatable;

use Illuminate\Support\ServiceProvider;

/**
 * Class MetadatableServiceProvider.
 */
class MetadatableServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                $this->configPath() => config_path('metadatable.php'),
            ], 'metadatable');

            $this->loadMigrationsFrom($this->migrationsDirectory());
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom($this->configPath(), 'metadatable');
    }

    /**
     * Return config path.
     *
     * @return string
     */
    protected function configPath()
    {
        return __DIR__.'/../config/metadatable.php';
    }

    /**
     * Return migrations directory.
     *
     * @return string
     */
    protected function migrationsDirectory()
    {
        return __DIR__.'/../database/migrations';
    }
}
