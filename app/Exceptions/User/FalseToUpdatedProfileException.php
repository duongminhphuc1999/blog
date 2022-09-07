<?php

namespace App\Exceptions\User;

use App\Traits\JsonResponser;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class FalseToUpdatedProfileException extends Exception
{
    use JsonResponser;

    public function render($request): JsonResponse
    {
        return response()->json([
            'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
            'message' => 'Token is invalid'
        ]);
    }
}
