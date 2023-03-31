<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompareList extends Model
{
    use HasFactory;

    public $fillable = [
        "user_id" ,
        "product_id"
    ] ;


    //////////////////////////////////////////// Relations ///////////////////////////////////
    public function product()
    {
        return $this->belongsTo(Product::class , "product_id");
    }
}
