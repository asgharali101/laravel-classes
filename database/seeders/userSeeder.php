<?php

namespace Database\Seeders;

use App\Models\company;
use App\Models\employers;
use App\Models\User;
use Database\Factories\EmployersFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(20)->create();
        // company::factory()->create([
        //     'employers_id' => Employers::Factory(),
        //     'name' => "Ali Brand",
        //     'description' => 'this company belongs to Ali',
        // ]);
    }
}
