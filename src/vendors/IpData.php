<?php

namespace bytes4sale\iplocator\vendors;

use bytes4sale\iplocator\ipLocatorConfig\IpLocatorConfig;
use bytes4sale\iplocator\net\HttpRequest;
use Exception;
use InvalidArgumentException;

class IpData implements BaseInterface
{
    protected $config;
    public function __construct(IpLocatorConfig $config)
    {
        $this->config = $config;
    }
    public function getIpCompleteDetails($ip): object
    {

        try {
            $credentials = $this->prepareCredentials();

            $httpRequest = new HttpRequest();
            $response = $httpRequest->get("https://api.ipdata.co/$ip?api-key=" . $credentials['key'], HttpRequest::APPLICATION_JSON);

            if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 300) {
                $responseContentArray = json_decode($response->getContent());
                $response->setCarrierDetails($responseContentArray->carrier);
                $response->setLanguages($responseContentArray->languages);
                $response->setCurrency($responseContentArray->currency);
                $response->setTimeZone($responseContentArray->time_zone);
                $response->setThreat($responseContentArray->threat);
                $response->setAsn($responseContentArray->asn);
                $response->setTodayRequestCount($responseContentArray->count);
            }
            return $response;
        } catch (Exception $exception) {
            throw $exception;
        }
    }
    public function prepareCredentials()
    {
        if (empty($this->config->getCredentials())) {
            if (config('iplocator.api-key')) {
                return ["key" => config('iplocator.api-key')];
            } else {
                throw new InvalidArgumentException('Api key is missing please set IPDATA_KEY in .env file, If you have already set then please try config:cache command');
            }
        } else {
            return $this->config->getCredentials();
        }
    }
}
