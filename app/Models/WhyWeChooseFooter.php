<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyWeChooseFooter extends Model
{
    use HasFactory;

    public $fillable = [
        "title_ar",
        "title_en",
        "link_ar",
        "link_en"
    ];
}
