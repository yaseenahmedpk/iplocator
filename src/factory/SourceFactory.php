<?php

namespace bytes4sale\iplocator\factory;

use bytes4sale\iplocator\ipLocatorConfig\IpLocatorConfig;
use bytes4sale\iplocator\vendors\IpApi;
use bytes4sale\iplocator\vendors\IpData;
use bytes4sale\iplocator\vendors\IpStack;
use Exception;

class SourceFactory
{
    protected $config;

    public function __construct(IpLocatorConfig $config)
    {
        $this->config = $config;
    }
    public function getSource()
    {
        $source = $this->config->getSource();

        if ($source) {
            return $this->getSourceClassObject(strtolower($source));
        } else {
            $sourceFromEnv = config('iplocator.source');

            if (empty($sourceFromEnv)) {
                throw new Exception('IP_LOCATOR_SOURCE is missing or empty. Please set it in your .env file or you can call bytes4sale\iplocator\Confid::setSource() to set ipLocator source');
            } else {

                return $this->getSourceClassObject(strtolower($sourceFromEnv));
            }
        }
    }

    private function getSourceClassObject($source)
    {
        switch ($source) {
            case "ipdata":
                return new IpData($this->config);
            case 'ipstack':
                return new IpStack($this->config);
            case 'ip-api':
                return new IpApi($this->config);
            default:
                throw new Exception('Invalid ip source provided please follow documentation for available ip data sources');
        }
    }
}
