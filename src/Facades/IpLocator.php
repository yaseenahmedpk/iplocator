<?php

namespace bytes4sale\iplocator\Facades;

use Illuminate\Support\Facades\Facade;

class IpLocator extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'iplocator';
    }
}
