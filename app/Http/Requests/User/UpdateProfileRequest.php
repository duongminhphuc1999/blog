<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => 'min:2|max:30|unique:users',
            'first_name' => 'max:20',
            'last_name' => 'max:20',
            'birthday' => 'date|after:today'
        ];
    }
}
