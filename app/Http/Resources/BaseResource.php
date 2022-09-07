<?php

namespace App\Http\Resources;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

abstract class BaseResource extends JsonResource
{
    protected $attributes = [];

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [];

        foreach ($this->attributes as $key => $attr) {
            if (intval($key) == $key) {
                $key = $attr;
            }
            $data[$attr] = $this[$key];
        }

        return $this->transformData($data);
    }

    public function response($request = null): JsonResponse
    {
        return response()->json($this->toArray($request));
    }

    protected function transformData(array $data): array
    {
        return $data;
    }
}
