<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTopAdv extends Model
{
    use HasFactory;

    public $fillable = [
        "main_image" ,
        "link" ,
        "title" ,
        "description"
    ];
}
