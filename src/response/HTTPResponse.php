<?php

namespace bytes4sale\iplocator\response;

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
    private $todayRequestCount;

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
            'description' => $this->getContent()
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
}
