<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class employers extends Model
{
    use HasFactory;
    protected $table = "employers";
    protected $fillable = (["name"]);

    public function job()
    {
        return $this->hasMany(\App\Models\Job::class);
    }
}
