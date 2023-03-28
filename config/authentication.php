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
    ]
];