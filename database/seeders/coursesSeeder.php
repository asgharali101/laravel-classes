<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class coursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::factory(20)->create();
        // Course::factory()->create([
        //     "title" => 'Web Devleoping course with Asghar',
        //     "image_path" => "1.png",
        //     'body' => 'hi there today we learn about web develoing course'
        // ]);
    }
}
