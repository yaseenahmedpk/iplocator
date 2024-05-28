<?php
namespace bytes4sale\iplocator\vendors;

use bytes4sale\iplocator\ipLocatorConfig\IpLocatorConfig;
use bytes4sale\iplocator\net\HttpRequest;
use InvalidArgumentException;
use Exception;

class IpApi implements BaseInterface
{
    protected $config;
    public function __construct(IpLocatorConfig $config)
    {
        $this->config = $config;
    }

    public function getIpCompleteDetails($ip): object
    {
        try {
            if (!is_array($ip)) {
                throw new InvalidArgumentException('Please provide Ips list as array');
            }
            $data = json_encode($ip);
            $httpRequest = new HttpRequest();
            $response = $httpRequest->post("http://ip-api.com/batch", $data, HttpRequest::APPLICATION_JSON);

            if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 300) {

                $responseContentArray = json_decode($response->getContent());
                if ($responseContentArray[0]->status) {
                    $response->setTimeZone($responseContentArray[0]->timezone);
                    $response->setCountryCode($responseContentArray[0]->countryCode);
                    $response->setCountryName($responseContentArray[0]->country);
                    $response->setRegionCode($responseContentArray[0]->region);
                    $response->setRegionName($responseContentArray[0]->regionName);
                    $response->setCity($responseContentArray[0]->city);
                    $response->setZip($responseContentArray[0]->zip);
                    $response->setLatitude($responseContentArray[0]->lat);
                    $response->setLongitude($responseContentArray[0]->lon);
                    $response->setIsp($responseContentArray[0]->isp);
                }
            }
            return $response;
        } catch (Exception $exception) {
            throw $exception;
        }
    }

}