<?php

namespace Database\Factories;

use App\Models\Contract;
use App\Models\Owner;
use App\Models\Resident;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contract>
 */
class ContractFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'owner_id' => $owner = User::where('userable_type', 'App\Models\Owner')->get('id')->random(),
            'unit_id' => Unit::where('owner_id', $owner->id)->get('id')->random(),
            'resident_id' => Resident::factory(),
            'entry_date' => fake()->dateTimeBetween($startDate =  '-5 month', 'now'),
            'leaving_date' => fake()->dateTimeBetween('now', '+1 week'),
            'status' => fake()->randomElement(['اعتماد المستأجر', 'مرفوض', 'مراجعة الوسيط', 'دفع المالك', 'معتمد', 'ملغي قبل الدفع', 'ملغي بعد الدفع']),
            'contract_fees' => fake()->numberBetween(50, 300),
            'rental_fees' => fake()->numberBetween(200, 3000),
            'otp' => fake()->numberBetween(1000, 9999),
            'created_by' => function (array $attributes) {
                return $attributes['owner_id'];
            },
            'created_at' => fake()->dateTimeBetween($startDate =  '-5 month', 'now'),
        ];
    }
}
