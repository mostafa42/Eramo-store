<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurFeature extends Model
{
    use HasFactory;

    public $fillable = [
        "icon" ,
        "title" ,
        "sub_title"
    ];
}
