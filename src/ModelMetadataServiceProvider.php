<?php

namespace WATR\Metadata;

use Illuminate\Support\ServiceProvider;

/**
 * Class ModelMetadataServiceProvider.
 */
class ModelMetadataServiceProvider extends ServiceProvider
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
                $this->configPath() => config_path('model-metadata.php')
            ], 'model-metadata');

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
        $this->mergeConfigFrom($this->configPath(), 'model-metadata');
    }

    /**
     * Return config path.
     *
     * @return string
     */
    protected function configPath()
    {
        return __DIR__.'/../config/model-metadata.php';
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
