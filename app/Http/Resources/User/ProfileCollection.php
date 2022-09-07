<?php

namespace App\Http\Resources\User;

use App\Http\Resources\BaseResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProfileCollection extends BaseResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return ProfileResource::collection($this->collection);
    }
}
