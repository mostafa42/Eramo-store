<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainSlider extends Model
{
    use HasFactory;
    public $fillable = [
        "main_image" ,
        "intro_title" ,
        "big_text" ,
        "description",
        "link"
    ] ;
}
