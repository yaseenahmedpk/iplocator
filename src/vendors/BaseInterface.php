<?php

namespace bytes4sale\iplocator\vendors;

interface BaseInterface
{
    /**
     * Get IP details.
     *
     * @return object
     */
    public function getIpCompleteDetails($ip): object;
}
