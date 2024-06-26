<?php

namespace bytes4sale\iplocator;

use bytes4sale\iplocator\ipLocatorConfig\IpLocatorConfig;
use bytes4sale\iplocator\factory\SourceFactory;
use Exception;
use Illuminate\Support\ServiceProvider;

class IpLocatorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/IpLocator.php', 'iplocator');
        $this->app->singleton('ipLocatorConfig', function () {
            return new IpLocatorConfig();
        });
        $this->app->singleton('iplocator', function () {
            try {
                $config = $this->app->make('ipLocatorConfig');
                $sourceFactoryObject = new SourceFactory($config);
                return $sourceFactoryObject->getSource();
            } catch (Exception $ex) {
                throw new Exception('Unable to get source class object OR maybe you have forgotten to set IP_LOCATOR_SOURCE in the env file.');
            }
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/IpLocator.php' => config_path('iplocator.php'),
        ], 'iplocator-config');
    }
}
