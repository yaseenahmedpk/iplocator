<?php

namespace bytes4sale\iplocator\net;

use bytes4sale\iplocator\response\HTTPResponse;

class HttpRequest
{

    const APPLICATION_JSON = "application/json";
    const APPLICATION_FORM_URLENCODED = "application/x-www-form-urlencoded";

    public static function get($url, $contentType, $headers = [])
    {
        $headers = array();
        $headers[] = "Content-Type: $contentType";

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $responseBody = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        $httpResponse = new HTTPResponse();
        $httpResponse->setStatusCode($statusCode);
        $httpResponse->setContent($responseBody);
        $httpResponse->setRequestString($url);

        if ($statusCode <= 0 || $statusCode != 200) {
            $httpResponse->setSuccessful(false);
            $httpResponse->setMessage("could not connect to host");
        } else {
            $httpResponse->setSuccessful(true);
        }

        return $httpResponse;
    }

    public static function post($url, $data, $contentType, $headers = [])
    {

        $ch = curl_init();
        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: ' . $contentType,
            'Content-Length: ' . strlen($data)
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $responseBody = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        $httpResponse = new HTTPResponse();
        $httpResponse->setStatusCode($statusCode);
        $httpResponse->setContent($responseBody);
        $httpResponse->setRequestString($url);

        if ($statusCode <= 0 || $statusCode != 200) {
            $httpResponse->setSuccessful(false);
            $httpResponse->setMessage("could not connect to host");
        } else {
            $httpResponse->setSuccessful(true);
        }

        return $httpResponse;
    }
}
