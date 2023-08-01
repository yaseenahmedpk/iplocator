<?php

namespace Bytes4sale\Iplocator;

use Bytes4sale\Iplocator\factory\SourceFactory;
use Bytes4sale\Iplocator\ipLocatorConfig\IpLocatorConfig;
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
        $this->mergeConfigFrom(__DIR__ . '/../config/IpLocator.php', 'iplocator');
        $this->app->singleton('ipLocatorConfig', function () {
            return new IpLocatorConfig();
        });
        $this->app->singleton('iplocator', function () {
            try {
                $config = $this->app->make('ipLocatorConfig');
                $sourceFactoryObject = new SourceFactory($config);
                return $sourceFactoryObject->getSource();
            } catch (Exception $ex) {
                throw new Exception('Unable to get source class object');
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
        $configFile = __DIR__ . '/../config/IpLocator.php';
        $this->publishes([
            $configFile => config_path('iplocator.php'),
        ], 'iplocator-config');
    }
}
