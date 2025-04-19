<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;
    protected $table = "courses";
    protected $fillable = ["title", "image_path", "body"];

    public function user()
    {
        return $this->belongsToMany(User::class, relatedPivotKey: "user_id");
    }
}
