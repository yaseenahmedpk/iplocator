<?php

return [

    /*
    |--------------------------------------------------------------------------
    | IpData api key
    |--------------------------------------------------------------------------
    |
    | This value is the api key of your ipdata account, this value will use to request
    | The data of your requested ip, make sure to create account on ipdate to get
    | Unlimited request you need to create premium account
    |
     */

    'source' => env('IP_LOCATOR_SOURCE', ''),

    /*
    |--------------------------------------------------------------------------
    | IpData api key
    |--------------------------------------------------------------------------
    |
    | This value is the api key of your ipdata account, this value will use to request
    | The data of your requested ip, make sure to create account on ipdate to get
    | Unlimited request you need to create premium account
    |
     */

    'api-key' => env('IPDATA_KEY', ''),

    /*
    |--------------------------------------------------------------------------
    | IpStack api key
    |--------------------------------------------------------------------------
    |
    | This value is the api key of your IpStack account, this value will use to request
    | The data of your requested ip, make sure to create account on IpStack to get
    | Unlimited request you need to create premium account
    |
     */
    'ipstack-api-key' => env('IPSTACK_KEY', ''),
];
