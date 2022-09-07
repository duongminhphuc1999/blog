<?php

use App\Enums\Permissions;
use App\Enums\UserRole;


return [
    UserRole::SUPPER_ADMIN->value => [
        'roles' => [
            'name' => UserRole::SUPPER_ADMIN->value,
        ],
    ],
    UserRole::ADMIN->value  => [
        'roles' => [
            'name' => UserRole::ADMIN->value,
        ],
        'permissions' => Permissions::cases(),
    ],
    UserRole::CLIENT->value => [
        'roles' => [
            'name' => UserRole::CLIENT->value,
        ],
        'permissions' => [
            Permissions::LIST_ARTICLE->value,
            Permissions::LIST_IMAGE->value,
            Permissions::SHOW_IMAGE->value,
            Permissions::UPDATE_IMAGE->value,
            Permissions::CREATE_IMAGE->value,
            Permissions::DELETE_IMAGE->value,
        ],
    ],
];
