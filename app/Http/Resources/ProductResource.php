<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @property mixed $name
 * @property mixed $id
 * @property mixed $amount
 * @property mixed $description
 * @property mixed $created_at
 * @property mixed $unique_product_id
 * @property mixed $is_scanned
 * @method category()
 */
class ProductResource extends JsonResource
{

    public const UNIQUE_PRODUCT_ID = 'KeyNetic_V1_ERT1230999978';
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    #[ArrayShape(['id' => "mixed", 'name' => "mixed", 'category' => "mixed", 'amount' => "mixed", 'description' => "mixed", 'created_at' => "mixed", 'unique_product_id' => "mixed", 'is_scanned' => "mixed"])]
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'category' => $this->category()->first()->name,
            'amount' => $this->amount,
            'description' => $this->description,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'unique_product_id' => $this->unique_product_id,
            'is_scanned' => $this->is_scanned
        ];
    }
}
