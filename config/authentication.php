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
//    'providers' => [
//        \NextDeveloper\Authentication\PassportServiceProvider::class,
//    ]
];