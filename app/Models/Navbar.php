<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Navbar extends Model
{
    use HasFactory;
    public $fillable = [
        "logo" ,
        "call_us"
    ] ;

    //// Accessories
    // protected function getLogoAttribute($logo){
    //     $path = asset('uploads/user_front/navbar');

    //     return  $this->attributes['logo'] = $path .'/'.$logo;
    // }
}
