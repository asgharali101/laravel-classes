<?php

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("image_path");
            $table->text("body");
            $table->timestamps();
        });

        Schema::create('user_course', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, "user_id")->constrained()->cascadeOnDelete()->casecadeOnUpdate();
            $table->foreignIdFor(Course::class, "course_id")->constrained()->cascadeOnDelete()->casecadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
        Schema::dropIfExists('user_course');
    }
};
