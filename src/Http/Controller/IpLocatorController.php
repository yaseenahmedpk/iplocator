<?php

namespace bytes4sale\iplocator\Http\Controller;

use App\Http\Controllers\Controller;

use bytes4sale\iplocator\Facades\IpLocator;
use bytes4sale\iplocator\Facades\IpLocatorConfig;
use Illuminate\Http\Request;

class IpLocatorController extends Controller
{

    public function getIpDetails()
    {
        // IpLocatorConfig::setSource("ipdata")->setCredentials(["key" => "58a45bd0c5c39fd783e04b3574e7f85e1acca0927b93be014b43054f"]);
        $response = IpLocator::getIpCompleteDetails('121.121.90.48');
        if ($response->isSuccessful()) {
            echo "<pre>";
            print_r($response->getLanguages());
            die;
        } else {
            echo "<pre>";
            print_r($response->getErrorResponse());
            die;
        }
    }
}
