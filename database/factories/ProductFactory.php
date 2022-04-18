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
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['name' => "string", 'amount' => "float", 'description' => "string", 'slug' => "string", 'category_id' => "\Illuminate\Support\HigherOrderCollectionProxy|mixed"])]
    public function definition(): array
    {
        $name = $this->faker->name();
        return [
            'name' => $name,
            'amount' => $this->faker->randomFloat(2, 2, 1000),
            'description' => implode((array)$this->faker->paragraph(5)),
            'slug' => Str::slug($name),
            'category_id' => Category::factory()->create()->id
        ];
    }
}
