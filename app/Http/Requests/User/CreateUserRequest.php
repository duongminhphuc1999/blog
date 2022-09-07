<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;

class CreateUserRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'email|required|unique:users',
            'password' => 'min:6|max:60|required',
            'username' => 'string|max:30|nullable',
            'first_name' => 'string|max:30|nullable',
            'last_name' => 'string|max:30|nullable',
            'birthday' => 'date|nullable',
            'image' => 'string|max:30|nullable',
            'description' => 'string|nullable',
            'role' => 'string|required'
        ];
    }
}
