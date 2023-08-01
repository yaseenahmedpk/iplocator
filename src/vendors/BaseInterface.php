<?php

namespace Bytes4sale\Iplocator\vendors;

interface BaseInterface
{
    /**
     * Get IP details.
     *
     * @return object
     */
    public function getIpCompleteDetails($ip): object;
}
