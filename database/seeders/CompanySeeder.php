<?php

namespace Database\Seeders;

use App\Models\company;
use App\Models\employers;
use Database\Factories\EmployersFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        company::factory(20)->create();
        // company::factory()->create([
        //     'employers_id' => Employers::Factory(),
        //     'name' => "Ali Brand",
        //     'description' => 'this company belongs to Ali',
        // ]);
    }
}
