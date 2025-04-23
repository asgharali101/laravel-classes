<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;
use App\Models\User;

class employers extends Model
{
    use HasFactory;
    protected $table = "employers";
    protected $fillable = (["user_id", "name"]);

    public function job()
    {
        return $this->hasMany(\App\Models\Job::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
