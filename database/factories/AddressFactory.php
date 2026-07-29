<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => fake()->buildingNumber(),
            'street_name' => fake()->streetName(),
            'unit' => '',
            'city' => fake()->city(),
            'state' => 'California',
            'zip_code' => fake()->postcode(),
        ];
    }
}
