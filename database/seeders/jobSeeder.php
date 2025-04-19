<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class jobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Job::factory(20)->create();
        // Job::factory()->create([
        //     "employers_id" => 2,
        //     'name' => "Web Developer",
        //     "sallary" => "20$",
        // ]);
    }
}
