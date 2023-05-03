<?php

namespace Database\Factories;

use App\Models\Contract;
use App\Models\Owner;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Owner>
 */
class OwnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_number' => fake()->randomElement([1,2]) . fake()->unique()->numerify('#########'),
            'phone' => fake()->unique()->numerify('05#######'),
            'created_by' => 1
        ];
    }
}
