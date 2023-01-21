<?php

return [
    'base_path' => env('JARASON_BASE_PATH', 'http://localhost/api'),
    'version' => env('JARASON_VERSION', 'v1'),
    'headers' => [
        'accept' => 'application/vnd.api+json',
    ],
];
