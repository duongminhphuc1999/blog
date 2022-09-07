<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    protected $attributes = [
        'id',
        'username',
        'email',
        'role',
        'first_name',
        'last_name',
        'birthday',
        'image',
        'description'
    ];
}
