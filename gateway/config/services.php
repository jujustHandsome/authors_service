<?php
return [
    'books' => [
        'base_uri' => env('Books_SERVICE_BASE_URL'),
        'secret' => env('Books_SERVICE_SECRET'),
    ],
    'authors' => [
        'base_uri' => env('Authors_SERVICE_BASE_URL'),
        'secret' => env('Authors_SERVICE_SECRET'),
    ],
    
];