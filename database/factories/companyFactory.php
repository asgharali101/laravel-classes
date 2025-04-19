<?php

namespace Database\Factories;

use App\Models\employers;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\company>
 */
class companyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            "employers_id" => Employers::Factory(),
            "name" => fake()->company(),
            "description" => fake()->address(),
        ];
    }
}
