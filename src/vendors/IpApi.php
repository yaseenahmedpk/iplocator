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
                if ($responseContentArray->status) {
                    $response->setTimeZone($responseContentArray->timezone);
                    $response->setCountryCode($responseContentArray->countryCode);
                    $response->setCountryName($responseContentArray->country);
                    $response->setRegionCode($responseContentArray->region);
                    $response->setRegionName($responseContentArray->regionName);
                    $response->setCity($responseContentArray->city);
                    $response->setZip($responseContentArray->zip);
                    $response->setLatitude($responseContentArray->lat);
                    $response->setLongitude($responseContentArray->lon);
                    $response->setIsp($responseContentArray->isp);
                }
            }
            return $response;
        } catch (Exception $exception) {
            throw $exception;
        }
    }

}