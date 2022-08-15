<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait JsonResponser
{

    public function successResponse(string $message = ''): JsonResponse
    {
        $message = empty($messags) ? __('messages.success.default') : $message;
        return response()->json([
            'status' => true,
            'message' => $message,
        ]);
    }
}
