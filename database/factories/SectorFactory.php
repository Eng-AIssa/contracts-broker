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
            'code' => fake()->numberBetween(1, 50),
            'registration_number' => fake()->buildingNumber(),
            'fees' => fake()->randomElement(['50', '75', '100', '120', '150', '175']),
            'manager_name' => fake()->name(),
            'manager_phone' => fake()->phoneNumber(),
            'manager_id' => fake()->buildingNumber(),
            'created_by' => 1
        ];
    }
}
