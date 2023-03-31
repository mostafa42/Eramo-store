<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipping extends Model
{
    use HasFactory ,SoftDeletes;

    protected $guarded = [];

   public function admin()
   {
       return $this->belongsTo(Admin::class, 'admin_id');
   }

   public function city()
   {
       return $this->belongsTo(City::class, 'city_id');
   }

}
