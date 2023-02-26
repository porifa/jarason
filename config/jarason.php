<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Request Headers
    |--------------------------------------------------------------------------
    |
    | Headers should be an array of headers sent with API request.
    |
    */
    'headers' => [
        'accept' => 'application/vnd.api+json',
    ],

    /*
    |--------------------------------------------------------------------------
    | Base Path
    |--------------------------------------------------------------------------
    |
    | The base path of API end-point
    |
    */
    'base_path' => env('JARASON_BASE_PATH', 'http://localhost/api'),

    /*
    |--------------------------------------------------------------------------
    | Version of API
    |--------------------------------------------------------------------------
    |
    | This is version of API which is used after base path
    |
    */
    'version' => env('JARASON_VERSION', 'v1'),

];
