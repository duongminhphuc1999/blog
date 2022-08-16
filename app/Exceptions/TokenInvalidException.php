<?php

namespace App\Exceptions;

use App\Traits\JsonResponser;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class TokenInvalidException extends Exception
{
    use JsonResponser;

    public function render($request): JsonResponse
    {
        return response()->json([
            'code' => Response::HTTP_UNAUTHORIZED,
            'message' => 'Token is invalid'
        ]);
    }
}
