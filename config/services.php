<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [
        'client_id' => '996426960551-k7lakputq7bgpmmqobo7eqnrgqs2106o.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:8000/callback'],
    // 'facebook' => [
    //     'client_id' => '309840780996133',
    //     'client_secret' => '21253974a9d189498a607212ac9086d4',
    //     'redirect' => 'http://localhost:8000/facebook/callback'],
    'facebook' => [
    'client_id' => env('FACEBOOK_CLIENT_ID'),
    'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
    'redirect' => 'http://localhost:8000/facebook/callback',
],
];
