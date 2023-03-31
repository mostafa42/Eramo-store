<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondAdvs extends Model
{
    use HasFactory;

    public $fillable = [
        "image" ,
        "link"
    ];
}
