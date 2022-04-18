<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run(): void
    {
        Order::factory()->count(9)->create();
        $orders = Order::all();
        Product::all()->each(static function ($product) use ($orders){
            $product->orders()->attach(
              $orders->random(random_int(1,3))->pluck('id')->toArray()
            );
        });
    }
}
