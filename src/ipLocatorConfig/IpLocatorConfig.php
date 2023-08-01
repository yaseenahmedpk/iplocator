<?php

namespace Bytes4sale\Iplocator\ipLocatorConfig;


class IpLocatorConfig
{
    private $source;
    private $credentials = [];

    public function __construct()
    {
    }

    /**
     * Undocumented function
     *
     * @param [string] $sourceName
     * @return void
     */
    public function setSource($sourceName)
    {
        $this->source = $sourceName;
        return $this;
    }

    /**
     * getSource function
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * setCredentials function
     *
     * @param [array] $credentials
     * @return void
     */
    public function setCredentials(array $credentials)
    {
        $this->credentials = $credentials;
        return $this;
    }

    /**
     * getCredentials function
     *
     * @return array
     */
    public function getCredentials()
    {
        return $this->credentials;
    }
}
