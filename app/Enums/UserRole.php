<?php

namespace App\Enums;

enum UserRole: string
{
    case SUPPER_ADMIN = 'supper-admin';
    case ADMIN = 'admin';
    case CLIENT = 'client';
}
