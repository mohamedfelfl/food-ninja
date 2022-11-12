<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meal>
 */
class MealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'price' => fake()->randomFloat(2, 30, 500),
            'description' => fake()->text(180),
            'image' => fake()->imageUrl(),
            'type' => fake()->randomElement(['Pizza', 'Drinks', 'Burger', 'Grilled']),
            'restaurant' => 'Salemtacky',
            'rating' => fake()->randomFloat(1, 1, 5),
            'tags' => fake()->randomElements(['Hot', 'New', 'Deal', 'Fast prep'], rand(1, 3)),
            'options' => [],
            'testimonials' => [],

        ];
    }
}
