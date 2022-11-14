<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => '1',
            'name' => fake()->name(),
            'date' => fake()->date(),
            'image_url' => fake()->imageUrl(),
            'price' => fake()->randomFloat(2, 10, 50),
            'status' => fake()->numberBetween(0, 2),
        ];
    }


}
