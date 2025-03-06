<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checkModel extends Model
{
    use hasFactory;
    protected $table = "check";
    protected $fillable = ["name","surname","gender","hobbies","city","file"];
   
}
?>