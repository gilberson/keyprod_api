<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends Factory
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws \Exception
     */
    #[ArrayShape(['order_reference' => "string", 'status' => "int", 'customer_id' => "int"])]
    public function definition(): array
    {
        $customers = Customer::select('id')->get()->toArray();
        $key = array_rand($customers);

        return [
            'order_reference' => $this->faker->isbn13(),
            'status' => random_int(1, 3),
            'customer_id' => $customers[$key],
        ];
    }
}
