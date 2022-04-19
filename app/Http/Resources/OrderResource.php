<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @property mixed $order_reference
 * @property mixed $status
 * @property mixed $created_at
 * @property mixed $id
 * @property mixed $total
 * @method customer()
 * @method products()
 */
class OrderResource extends JsonResource
{
    public const PENDING_STATUS = 'Pending';
    public const PROCESSING_STATUS = 'Processing';
    public const DONE_STATUS = 'Done';

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    #[ArrayShape(['id' => "mixed",'order_reference' => "mixed", 'status' => "mixed", 'created_at' => "mixed", 'customer' => "mixed", 'total' => "mixed"])]
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'order_reference' => $this->order_reference,
            'status' => $this->status,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'customer' => $this->customer()->first()->name ?? ' - ',
            'total' => $this->total()
        ];
    }

    public function getStatus($status): int|string
    {
        return match ($status) {
            1 => self::PENDING_STATUS,
            2 => self::PROCESSING_STATUS,
            3 => self::DONE_STATUS,
            default => '',
        };
    }

    /**
     * @return float|int
     */
    public function total(): float|int
    {
        $sum = 0;
        foreach ($this->products()->get() as $product)
        {
            $sum += $product->amount;
        }
        return $sum;
    }
}
