<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;
use JsonSerializable;

/**
 * @property mixed $tracking_number
 * @property mixed $status
 * @property mixed $description
 * @property mixed $created_at
 * @property mixed $id
 */
class TrackingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    #[ArrayShape(['id' => "mixed", 'tracking_number' => "mixed", 'status' => "mixed", 'description' => "mixed", 'created_at' => "mixed"])]
    public function toArray($request): array|JsonSerializable|Arrayable
    {
        return [
            'id' => $this->id,
            'tracking_number' => $this->tracking_number,
            'status' => $this->status,
            'description' => $this->description ?? '',
            'created_at' => $this->created_at->format('Y-m-d H:i:s')
        ];
    }
}
