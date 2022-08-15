<?php

namespace App\Services;

use App\Models\User;
use App\Services\BaseModelService;

class UserService extends BaseModelService
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }
}
