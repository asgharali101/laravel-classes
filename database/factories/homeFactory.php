<?php

namespace Database\Factories;

use App\Models\employers;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\home>
 */
class homeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "employers_id" => employers::factory(),
            "name" => fake()->name(),
            "age" => "10",
        ];
    }
}
