<?php

namespace Database\Factories;

use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offer>
 */
class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->name(),
            'start_date' => fake()->dateTimeBetween("25/9/2021"),
            'end_date' => fake()->dateTimeBetween("26/9/2021"),
            'amount' => fake()->randomFloat(2, 0.1, 0.9),
            'description' => fake()->text(),
            'foods_included' => fake()->randomElements([1,2,3,4,5,6,7,8,9,10], rand(1, 5)),
        ];
    }
}
