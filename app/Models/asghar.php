<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asghar extends Model
{
    use HasFactory;
    protected $table = "asghar";
    protected $fillable = ["name", "email", "password"];
}
