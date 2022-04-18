<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends Factory
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['name' => "string", 'description' => "string"])]
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => implode((array)$this->faker->paragraph(3))
        ];
    }
}
