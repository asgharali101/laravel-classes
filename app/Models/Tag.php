<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;
    protected $table = "tags";
    protected $fillable = ["name"];

    public function job()
    {
        return $this->belongsToMany(Job::class, relatedPivotKey: "job_listing_id");
    }
    public function user()
    {
        return $this->belongsToMany(user::class, "user_id");
    }
}
