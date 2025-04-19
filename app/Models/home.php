<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Events\ModelsPruned;

class home extends Model
{
    use HasFactory;
    protected $table = "home";
    protected $fillable = ["employers_id", "name", "age"];
}
