<?php

namespace bytes4sale\iplocator\vendors;

use bytes4sale\iplocator\ipLocatorConfig\IpLocatorConfig;
use bytes4sale\iplocator\net\HttpRequest;
use Exception;
use InvalidArgumentException;

class IpStack implements BaseInterface
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
            $response = $httpRequest->get("http://api.ipstack.com/$ip?access_key=" . $credentials['key'], HttpRequest::APPLICATION_JSON);

            if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 300) {
                $responseContentArray = json_decode($response->getContent());
                $response->setLanguages($responseContentArray->location->languages);
                $response->setContinentCode($responseContentArray->continent_code);
                $response->setContinentName($responseContentArray->continent_name);
                $response->setCountryCode($responseContentArray->country_code);
                $response->setCountryName($responseContentArray->country_name);
                $response->setCountryFlag($responseContentArray->location->country_flag);
                $response->setCountryFlagEmoji($responseContentArray->location->country_flag_emoji);
                $response->setCountryFlagEmojiUnicode($responseContentArray->location->country_flag_emoji_unicode);
                $response->setRegionCode($responseContentArray->region_code);
                $response->setRegionName($responseContentArray->region_name);
                $response->setCity($responseContentArray->city);
                $response->setZip($responseContentArray->zip);
                $response->setLatitude($responseContentArray->latitude);
                $response->setLongitude($responseContentArray->longitude);
                $response->setEu($responseContentArray->location->is_eu);
            }
            return $response;
        } catch (Exception $exception) {
            throw $exception;
        }
    }
    public function prepareCredentials()
    {
        if (empty($this->config->getCredentials())) {
            if (config('iplocator.ipstack-api-key')) {
                return ["key" => config('iplocator.ipstack-api-key')];
            } else {
                throw new InvalidArgumentException('Api key is missing please set IPSTACK_KEY in .env file, If you have already set then please try config:cache command');
            }
        } else {
            return $this->config->getCredentials();
        }
    }
}
