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
        $customersId = [];
        $customers = Customer::all();//Customer::select('id')->get()->toArray();
        foreach ($customers as $customer) {
            $customersId[] = $customer->id;
        }

        return [
            'order_reference' => $this->faker->isbn13(),
            'status' => random_int(1, 3),
            'customer_id' => $customersId[array_rand($customersId, 1)]
        ];
    }
}
