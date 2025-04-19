<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\employers;

class company extends Model
{
    use HasFactory;
    protected $table = "companies";
    protected $fillable = ["employers_id", "name", "description"];

    public function employer()
    {

        return $this->belongsTo(employers::class, "employers_id");
    }
}
