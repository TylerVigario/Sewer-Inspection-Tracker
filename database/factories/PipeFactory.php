<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Asset;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pipe>
 */
class PipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'upstream_asset_id' => Asset::factory(),
            'downstream_asset_id' => Asset::factory(),
            'size' => fake()->randomElement([1, 1.5, 2, 3, 4, 5]),
            'upstream_rim_to_invert' => fake()->numberBetween(12, 1200),
            'downstream_rim_to_invert' => fake()->numberBetween(12, 1200),
        ];
    }
}
