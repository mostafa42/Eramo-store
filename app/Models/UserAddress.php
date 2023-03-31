<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    public $fillable = [
        "flat" ,
        "address" ,
        "country_id" ,
        "city_id" ,
        "zip_code" ,
        "user_id" ,
        "status"
    ];

    ////////////////////////////////// Relationships //////////////////////////////////
    public function country()
    {
        return $this->belongsTo(Country::class , "country_id") ;
    }

    public function city()
    {
        return $this->belongsTo(City::class , "city_id") ;
    }
}
