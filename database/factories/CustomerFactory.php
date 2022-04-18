<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['name' => "string", 'title' => "string", 'phone' => "string", 'about' => "string", 'address' => "string", 'city' => "string", 'state' => "string", 'postal_code' => "string"])]
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'title' => $this->faker->title(),
            'phone' => $this->faker->phoneNumber(),
            'about' => implode((array)$this->faker->paragraph(5)),
            'address' => $this->faker->address(),
            'city' => $this->faker->city(),
            'state' => $this->faker->country(),
            'postal_code' => $this->faker->postcode()
        ];
    }
}
