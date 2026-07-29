<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([fake()->randomNumber(5, true), fake()->city . ' Collection System']),
            'customer_id' => Customer::factory(),
            'due' => fake()->dateTimeBetween('-10 years', '+10 years'),
            'lat' => fake()->latitude,
            'lng' => fake()->longitude,
        ];
    }
}
