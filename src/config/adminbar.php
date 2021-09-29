<?php

return [
    'icon' => '/vendor/nova-admin-bar/logo.svg',
    
    'dropdown_links' => [
        'Laravel Docs' => 'https://laravel.com/docs/master/eloquent-collections',
        'Nova Docs' => 'https://nova.laravel.com/docs/1.0/resources/fields.html',
        'Flagstudio' => 'https://flagstudio.ru',
    ],
    
    'links' => [
        'Admin panel' => '/nova',
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Bar position
    |--------------------------------------------------------------------------
    |
    | Supported: "top", "bottom"
    |
    */
    'position' => 'top',

    //Namespace to nova resources
    'resources_namespace' => '\\App\\Nova\\',
];