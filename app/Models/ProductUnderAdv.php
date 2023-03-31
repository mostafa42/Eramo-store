<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductUnderAdv extends Model
{
    use HasFactory;

    public $fillable = [
        "image" ,
        "link"
    ] ;
}
