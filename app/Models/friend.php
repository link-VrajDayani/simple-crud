<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class friend extends Model
{
    use HasFactory;
    protected $table = "friend";
    protected $fillable = ["name"];
}
?>