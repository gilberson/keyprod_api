<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use JetBrains\PhpStorm\ArrayShape;
use Illuminate\Support\Collection;
use JsonSerializable;

class TrackingCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    #[ArrayShape(['data' => Collection::class])]
    public function toArray($request): array|JsonSerializable|Arrayable
    {
        return [
            'data' => $this->collection
        ];
    }
}
