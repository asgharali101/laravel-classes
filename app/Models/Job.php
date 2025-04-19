<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use App\Models\employers;



class Job extends Model

{
    use HasFactory;

    protected $table = "job_listing";
    protected $fillable = ["employers_id", "title", "sallary"];

    public function employer()
    {
        return $this->belongsTo(employers::class, "employers_id");
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey: "tag_id");
    }



    // public static function all(): array
    // {
    //     // $jobs = [
    //     //     [
    //     //         "id" => 1,
    //     //         "title" => "Programmer",
    //     //         "sallary" => "50k",
    //     //     ],
    //     //     [
    //     //         "id" => 2,
    //     //         "title" => "Content writter",
    //     //         "sallary" => "20k",
    //     //     ],
    //     //     [
    //     //         "id" => 3,
    //     //         "title" => "News Ankar",
    //     //         "sallary" => "10k",
    //     //     ],
    //     // ];
    //     // return $jobs;
    // }

    // public static function find($id): array
    // {
    //     $job = Arr::first(Job::all(), fn($jobs) => $jobs["id"] == $id);
    //     if (! $job) {
    //         abort(404);
    //     }
    //     return $job;
    // }

}
