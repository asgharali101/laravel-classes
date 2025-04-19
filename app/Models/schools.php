<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class schools extends Model
{
    protected $table = "schools";
    protected $fillable = (["name", "principal"]);
}
