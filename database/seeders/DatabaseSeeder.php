<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Unit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'userable_id' => 1,
            'userable_type' => 'App\Models\Owner',
            'name' => 'Eng.Abdulrahman',
            'email' => 'abd-wn2009@hotmail.com',
            'password' => Hash::make('12345678')
        ]);

        \App\Models\Owner::factory()->create([
            'id_number' => 2120226127,
            'phone' => '0540326313',
            'created_by' => 1
        ]);

        $this->call([
            ScenarioSeeder::class
        ]);


    }
}
