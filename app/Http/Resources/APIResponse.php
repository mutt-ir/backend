<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class APIResponse extends JsonResource
{
    protected static $statusCode ;
    public function __construct($resource, $statusCode = 200)
    {
        parent::__construct($resource);
        self::$statusCode = $statusCode;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        $data = parent::toArray($request);
        $data = $this->responseDependOnStatus($data);

        return array_merge([
            'status' => self::statusIsSuccess()
        ], $data);
    }

    private function statusIsSuccess(): bool
    {
        return self::$statusCode == 200;
    }

    private function responseDependOnStatus($data): array
    {
        return $this->statusIsSuccess() ? [
            'data' => $data
        ] : [
            'errors' => $data
        ];
    }
}
