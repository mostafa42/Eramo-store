<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory;
    public $fillable = [
        "quantity" ,
        "user_id" ,
        "product_id"
    ] ;

    ///////////////////////////////////////////////////// Relationships ///////////////////////////////////
    public function product()
    {
        return $this->hasOne(Product::class , "id" , "product_id") ;
    }
}