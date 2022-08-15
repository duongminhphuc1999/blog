<?php

namespace App\Enums;

enum UserRole: int
{
    case SUPPER_ADMIN = 1;
    case ADMIN = 2;
    case MANAGER = 3;
    case AUTHOR = 4;
}
