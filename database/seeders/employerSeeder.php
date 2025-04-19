<?php

namespace Database\Seeders;

use App\Models\employers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class employerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        employers::factory(20)->create();
        // employers::factory()->create([
        //     "name" => "Asghar Ali"
        // ]);
    }
}
