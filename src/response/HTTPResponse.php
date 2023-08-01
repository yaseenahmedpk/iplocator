<?php

namespace Bytes4sale\Iplocator\response;

class HTTPResponse
{

    private $statusCode;
    private $content;
    private $successful = false;
    private $requestString;
    private $message;
    private $carrierDetails;
    private $languageDetails;
    private $currency;
    private $timeZone;
    private $threat;
    private $asn;
    private $todayRequestCount;
    private $continentCode;
    private $continentName;
    private $countryCode;
    private $countryName;
    private $countryFlag;
    private $countryFlagEmoji;
    private $countryFlagEmojiUnicode;
    private $regionName;
    private $regionCode;
    private $city;
    private $zip;
    private $isEu;
    private $latitude;
    private $longitude;

    public function __construct()
    {
    }

    /**
     * @return the http request status code i.e. 200, 500
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param statusCode to set status code <b>will be used by http client to
     * update the info</b>
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    /**
     * @return the content/body of http response
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param content to set the content/body of http response <b>will be used by
     * http client to update the info</b>
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    public function isSuccessful()
    {
        return $this->successful;
    }

    /**
     * @param successfull the successful to set
     */
    public function setSuccessful($successfull)
    {
        $this->successful = $successfull;
    }

    /**
     * @return the requestString
     */
    public function getRequestString()
    {
        return $this->requestString;
    }

    /**
     * @param requestString the requestString to set
     */
    public function setRequestString($requestString)
    {
        $this->requestString = $requestString;
    }

    /**
     * setMessage function
     *@param string $message set response message
     * @return void
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }
    /**
     * getMessage function
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * setCarrierDetails function
     *
     * @param [object] $carrierDetails
     * @return void
     */
    public function setCarrierDetails($carrierDetails)
    {
        $this->carrierDetails = $carrierDetails;
    }
    /**
     * getCarrierDetails function
     *
     * @return object
     */
    public function getCarrierDetails()
    {
        return $this->carrierDetails;
    }
    /**
     * getErrorResponse function
     *
     * @return array
     */
    public function getErrorResponse()
    {
        return [
            'successful' => $this->isSuccessful(),
            'statusCode' => $this->getStatusCode(),
            'message' => $this->getMessage(),
            'description' => $this->getContent(),
        ];
    }
    /**
     * setLanguages function
     *
     * @param [object] $languageDetails
     * @return void
     */
    public function setLanguages($languageDetails)
    {
        $this->languageDetails = $languageDetails;
    }

    /**
     * getLanguages function
     *
     * @return object
     */
    public function getLanguages()
    {
        return $this->languageDetails;
    }
    /**
     * setCurrency function
     *
     * @param [object] $currency
     * @return void
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * getCurrency function
     *
     * @return object
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * setTimeZone function
     *
     * @param [object] $timeZone
     * @return void
     */
    public function setTimeZone($timeZone)
    {
        $this->timeZone = $timeZone;
    }

    /**
     * getTimeZone function
     *
     * @return object
     */
    public function getTimeZone()
    {
        return $this->timeZone;
    }
    /**
     * setThreat function
     *
     * @param [object] $threat
     * @return void
     */
    public function setThreat($threat)
    {
        $this->threat = $threat;
    }

    /**
     * getThreat function
     *
     * @return object
     */
    public function getThreat()
    {
        return $this->threat;
    }
    /**
     * setAsn function
     *
     * @param [object] $asn
     * @return void
     */
    public function setAsn($asn)
    {
        $this->asn = $asn;
    }

    /**
     * getAsn function
     *
     * @return object
     */
    public function getAsn()
    {
        return $this->asn;
    }
    /**
     * setTodayRequestCount function
     *
     * @param [object] $todayRequestCount
     * @return void
     */
    public function setTodayRequestCount($todayRequestCount)
    {
        $this->todayRequestCount = $todayRequestCount;
    }

    /**
     * getTodayRequestCount function
     *
     * @return object
     */
    public function getTodayRequestCount()
    {
        return $this->todayRequestCount;
    }

    /**
     * setContinentCode function
     *
     * @param [string] $continentCode
     * @return void
     */
    public function setContinentCode($continentCode)
    {
        $this->continentCode = $continentCode;
    }

    /**
     * setContinentName function
     *
     * @param [string] $continentName
     * @return void
     */
    public function setContinentName($continentName)
    {
        $this->continentName = $continentName;
    }

    /**
     * getContinent function
     *
     * @return array
     */
    public function getContinentDetails()
    {
        return [
            'code' => $this->continentCode,
            'name' => $this->continentName,
        ];
    }

    /**
     * setCountryCode function
     *
     * @param [string] $countryCode
     * @return void
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    }

    /**
     * setCountryName function
     *
     * @param [string] $countryName
     * @return void
     */
    public function setCountryName($countryName)
    {
        $this->countryName = $countryName;
    }

    /**
     * setCountryFlag function
     *
     * @param [string] $countryFlag
     * @return void
     */
    public function setCountryFlag($countryFlag)
    {
        $this->countryFlag = $countryFlag;
    }

    /**
     * setCountryFlagEmoji function
     *
     * @param [string] $countryFlagEmoji
     * @return void
     */
    public function setCountryFlagEmoji($countryFlagEmoji)
    {
        $this->countryFlagEmoji = $countryFlagEmoji;
    }
    /**
     * setCountryFlagEmojiUnicode function
     *
     * @param [string] $countryFlagEmojiUnicode
     * @return void
     */
    public function setCountryFlagEmojiUnicode($countryFlagEmojiUnicode)
    {
        $this->countryFlagEmojiUnicode = $countryFlagEmojiUnicode;
    }

    /**
     * getCountryDetails function
     *
     * @return array
     */
    public function getCountryDetails()
    {
        return [
            'code' => $this->countryCode,
            'name' => $this->countryName,
            'flag' => $this->countryFlag,
            'flagEmoji' => $this->countryFlagEmoji,
            'flagEmojiUnicode' => $this->countryFlagEmojiUnicode,
        ];
    }

    /**
     * setRegionCode function
     *
     * @param [string] $regionCode
     * @return void
     */
    public function setRegionCode($regionCode)
    {
        $this->regionCode = $regionCode;
    }
    /**
     * setRegionName function
     *
     * @param [string] $regionName
     * @return void
     */
    public function setRegionName($regionName)
    {
        $this->regionName = $regionName;
    }

    /**
     * getRegionDetails function
     *
     * @return array
     */
    public function getRegionDetails()
    {
        return [
            'code' => $this->regionCode,
            'name' => $this->regionName,
        ];
    }

    /**
     * setCity function
     *
     * @param [string] $city
     * @return void
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * getCity function
     *
     * @return void
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * setZip function
     *
     * @param [string] $zip
     * @return void
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * getZip function
     *
     * @return void
     */
    public function getZip()
    {
        return $this->zip;
    }
    /**
     * setEu function
     *
     * @param [string] $eu
     * @return void
     */
    public function setEu($eu)
    {
        $this->isEu = $eu;
    }

    /**
     * isEu function
     *
     * @return void
     */
    public function isEu()
    {
        return $this->isEu;
    }

    /**
     * setLatitude function
     *
     * @param [string] $latitude
     * @return void
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * setLongitude function
     *
     * @param [string] $longitude
     * @return void
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    public function getLatLong()
    {
        return [
            'lat' => $this->latitude,
            'long' => $this->longitude,
        ];
    }
}
