<?php

namespace App\Http\Resources\api;

use App\Http\Resources\APIResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class APIShortResponse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return APIResponse
     */
    public function toArray($request): APIResponse
    {
        return new APIResponse([
            'url' => $this->url,
            'slug' => $this->slug,
            'shortened_url' => url($this->slug)
        ]);
    }
}
