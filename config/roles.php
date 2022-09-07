<?php
return [
    'super_admin' => [
        'roles' => [
            'name' => 'super-admin',
        ],
    ],
    'admin' => [
        'roles' => [
            'name' => 'admin',
        ],
        'permissions' => [
            'list_article',
            'show_article',
            'update_article',
            'list_image',
            'show_image',
            'update_image',
            'create_image',
            'delete_image',
        ],
    ],
    'client' => [
        'roles' => [
            'name' => 'client',
        ],
        'permissions' => [
            'list_article',
            'list_image',
            'show_image',
            'update_image',
            'create_image',
            'delete_image',
        ],
    ],
];
