<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends Factory
 */
class ProductFactory extends Factory
{

    public const APP_NAME = 'KeyNetic';
    public const APP_VERSION = 'V1';

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['name' => "string", 'amount' => "float", 'description' => "string", 'slug' => "string", 'category_id' => "int", 'unique_product_id' => 'string'])]
    public function definition(): array
    {
        $name = $this->faker->name();
        $date = date('Y-m-d H:i:s');

        return [
            'name' => $name,
            'amount' => $this->faker->randomFloat(2, 2, 1000),
            'description' => implode((array)$this->faker->paragraph(5)),
            'slug' => Str::slug($name),
            'category_id' => Category::factory()->create()->id,
            'unique_product_id' => unique_product_id(self::APP_NAME, self::APP_VERSION)
        ];
    }
}
