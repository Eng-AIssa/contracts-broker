<?php

namespace Database\Seeders;

use App\Models\Contract;
use App\Models\Owner;
use App\Models\Sector;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use function Symfony\Component\String\s;

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


        //create owners to use them in contracts & units factories
        $owners = \App\Models\User::factory(10)->state(['userable_type' => 'App\Models\Owner', 'userable_id' => Owner::factory()])->create();

        //create sectors to use them in units factory
        $sectors = \App\Models\User::factory(4)->state(['userable_type' => 'App\Models\Sector', 'userable_id' => Sector::factory(), 'name' => 'sector'])->create();

        //create units to use them in contracts factory
        $units = \App\Models\Unit::factory(30)->state(['created_by' => 1])->create();

        //create contracts
        \App\Models\Contract::factory(100)->create();
    }
}
