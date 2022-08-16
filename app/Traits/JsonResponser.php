<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait JsonResponser
{

    public function successResponse(string|array $data = ''): JsonResponse
    {

        if (is_string($data)) {
            $data = empty($data) ? ['message' => __('messages.success.default')] : ['message' => $data];
        }

        return response()->json(array_merge(['status' => true], $data));
    }
}
