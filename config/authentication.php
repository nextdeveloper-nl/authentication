<?php

return [
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    
        'api' => [
            'driver' => 'passport',
            'provider' => 'users',
        ],
    ],
    'providers' => [
        Laravel\Passport\PassportServiceProvider::class
    ],
    
    'social_login' =>[
       'github' => [
            'client_id' => env('GITHUB_CLIENT_ID'),
            'client_secret' => env('GITHUB_CLIENT_SECRET'),
            'redirect' => env('GITHUB_REDIRECT')
       ],
    ]
];