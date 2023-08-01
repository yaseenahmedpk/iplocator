<?php

namespace Bytes4sale\Iplocator\Facades;

use Illuminate\Support\Facades\Facade;

class IpLocatorConfig extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ipLocatorConfig';
    }
}
