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
            //assign unit ownership to random owner
            'sector_id' => User::where('userable_type', 'App\Models\Sector')->get('id')->random(),
            'owner_id' => User::where('userable_type', 'App\Models\Owner')->get('id')->random(),
            //assign unit responsibility to random owner
            'responsible_id' => User::where('userable_type', 'App\Models\Owner')->get('id')->random(),
            'responsible_as' => fake()->randomElement(UNIT::RESPONSIBILITY_FORMS),
            'created_by' => function (array $attributes) {
                return $attributes['owner_id'];
            }
        ];
    }
}
