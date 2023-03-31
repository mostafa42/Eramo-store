<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopNavbar extends Model
{
    use HasFactory;

    public $fillable = [
        "welcome_to" ,
        "deliver_in" ,
        "code"
    ] ;
}
