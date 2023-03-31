<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory ,SoftDeletes;

    protected $guarded = [];
    protected $appends =['title'];

    protected function getTitleAttribute(){
        $title = 'title_'.app()->getLocale();
        return  $this->$title;

    }


   public function cities()
   {
       return $this->hasMany(City::class, 'country_id', 'id');
   }

   public function regions()
   {
       return $this->hasMany(Region::class, 'country_id', 'id');
   }


   public function users()
   {
       return $this->hasMany(User::class, 'country_id', 'id');
   }

   public function admin()
   {
       return $this->belongsTo(Admin::class, 'admin_id');
   }


}
