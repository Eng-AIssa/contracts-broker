<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sector>
 */
class SectorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => fake()->unique()->numberBetween(1, 5),
            'registration_number' => fake()->randomElement([9,8]) . fake()->unique()->numerify('#########'),
            'fees' => fake()->randomElement(['50', '75', '100', '120', '150', '175']),
            'manager_name' => fake()->name(),
            'manager_phone' => fake()->unique()->numerify('05#######'),
            'manager_id' => fake()->randomElement([1,2]) . fake()->unique()->numerify('#########'),
            'created_by' => 1
        ];
    }
}
