<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    public $fillable = [
        "video_link" ,
        "about_us_ar" ,
        "about_us_en"
    ];
}