<?php

namespace bytes4sale\iplocator\Http\Controller;

use App\Http\Controllers\Controller;
use bytes4sale\iplocator\Facades\IpLocator;
use bytes4sale\iplocator\Facades\IpLocatorConfig;

class IpLocatorController extends Controller
{

    public function getIpDetails()
    {
        // IpLocatorConfig::setSource("ipstack")->setCredentials(["key" => "a007e39c625f1e41c4dcc08004a2b61d"]);
        $response = IpLocator::getIpCompleteDetails('121.121.90.48');
        if ($response->isSuccessful()) {
            echo "<pre>";
            print_r($response->getCountryDetails());
            die;
        } else {
            echo "<pre>";
            print_r($response->getErrorResponse());
            die;
        }
    }
}
