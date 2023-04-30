<?php

namespace Database\Factories;

use App\Models\Contract;
use App\Models\Owner;
use App\Models\Sector;
use App\Models\UNIT;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Unit>
 */
class UnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => fake()->unique()->numerify('unit-####'),
            'owner_id' => User::factory(),
            'responsible_id' => function (array $attributes) {
                return $attributes['owner_id'];
            },
            'responsible_as' => fake()->randomElement([UNIT::AS_OWNER, UNIT::AS_RENTER, UNIT::AS_AUTHORIZED]),
            'created_by' => function (array $attributes) {
                return $attributes['owner_id'];
            }
        ];
    }
}
