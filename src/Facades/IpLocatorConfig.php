<?php

namespace bytes4sale\iplocator\Facades;

use Illuminate\Support\Facades\Facade;

class IpLocatorConfig extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ipLocatorConfig';
    }
}
