<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job_tag extends Model
{
    /** @use HasFactory<\Database\Factories\job_tagFactory> */
    use HasFactory;
    protected $table = "job_tag";
    protected $fillable = ["job_listing_id", "tag_id"];
}
