<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

abstract class BaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @throws \Illuminate\Validation\HttpResponseException
     */
    protected function failedValidation(Validator $validator): void
    {
        $oldInvalidArray = $validator->errors()->toArray();
        $newInvalidArray = [];

        foreach ($oldInvalidArray  as $invalidElementKey => $value) {
            $newInvalidArray[$invalidElementKey] = $value[0];
        }
        throw new HttpResponseException(response()->json([
            "message_id" => 'E9998',
            "message" => __('messages.errors.E9998'),
            "errors" => $newInvalidArray
        ], Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
