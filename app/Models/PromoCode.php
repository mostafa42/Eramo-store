<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class PromoCode extends Model
{
    use HasFactory ,SoftDeletes;

    protected $guarded = [];

   public function admin()
   {
       return $this->belongsTo(Admin::class, 'admin_id');
   }

   public function user()
   {
       return $this->belongsTo(User::class, 'user_id');
   }

//    protected function dedicatedTo(): Attribute
//    {
//        return Attribute::make(
//            get: function($value){

//             $exploded = explode('_' ,$value );
//             $imploded = implode(' ', $exploded );
//             $capital_letters =ucfirst($imploded );

//             return $capital_letters;
//            },
//        );
//    }


}
