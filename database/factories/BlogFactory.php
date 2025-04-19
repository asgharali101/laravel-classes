<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => fake()->title(),
            "excerpt" => fake()->text(),
            "description" => fake()->text(),
            "feature_image" => "images/r88Lmde68YEqzPuoLCB2sme6oAXaA9GJMMdXHcPg.jpg",
            "video_path" => "images/r88Lmde68YEqzPuoLCB2sme6oAXaA9GJMMdXHcPg.mp4",
        ];
    }
}
