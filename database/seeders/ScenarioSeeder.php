<?php

namespace Database\Seeders;

use App\Models\Contract;
use App\Models\Owner;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScenarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Create & Attach 3 Residents to specific user
         * & Create 3 Contract - for that User - with single Unit
         */
        /*$user = \App\Models\User::factory()
            ->has(\App\Models\Contract::factory(3)
                ->for($unit = \App\Models\Unit::factory()))
            ->hasAttached(\App\Models\Resident::factory(3))
            ->create();*/

        /**
         * Create 3 Contract - for specific User - with specific Resident
         */
        /*\App\Models\Contract::factory(3)
            ->for(\App\Models\Resident::factory())
            ->state(['owner_id' => $user->id])
            ->create();*/

        \App\Models\Contract::factory(1000)->create();
    }
}
