<?php

namespace Database\Seeders;

use App\Models\company;
use App\Models\Course;
use App\Models\employers;
use App\Models\Job;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        company::factory(10)->create();
        Course::factory(10)->create();
        employers::factory(10)->create();
        Job::factory(10)->create();


        // User::factory()->create([
        //     'first_name' => 'Test User',
        //     'last_name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
