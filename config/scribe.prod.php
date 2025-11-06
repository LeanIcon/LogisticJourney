<?php

return [
    'title' => config('app.name') . ' API Documentation',
    'description' => '',
    'base_url' => config('app.url'),
    
    'type' => 'static',
    'static' => [
        'output_path' => 'public/docs',
    ],
    
    'routes' => [
        [
            'match' => [
                'prefixes' => ['api/*'],
                'domains' => ['*'],
            ],
        ],
    ],
    
    'try_it_out' => [
        'enabled' => true,
        'base_url' => null,
        'use_csrf' => false,
        'csrf_url' => '/sanctum/csrf-cookie',
    ],
];