<?php

namespace App\Http\Resources;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BaseCollection extends ResourceCollection
{
    protected function preparePaginatedResponse($request): JsonResponse
    {
        return (new CustomPaginatedResourceResponse($this))->toResponse($request);
    }
}
