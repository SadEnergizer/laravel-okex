<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Okex authentication
    |--------------------------------------------------------------------------
    |
    | Authentication key and secret for Okex API.
    |
     */

    'auth' => [
        'key'    => env('OKEX_KEY', ''),
        'secret' => env('OKEX_SECRET', ''),
    ],

    /*
    |--------------------------------------------------------------------------
    | Api URL
    |--------------------------------------------------------------------------
    |
    | Url for Okex API
    |
     */

    'url' => env('OKEX_URL', 'https://www.okex.com/api'),

    /*
    |--------------------------------------------------------------------------
    | Api version
    |--------------------------------------------------------------------------
    |
    | Version for Okex API
    |
     */

    'version' => env('OKEX_VERSION', 'v1'),

];