<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable ,SoftDeletes;

    protected $guarded = [];


    protected $appends =['image_url' ];

    public $fillable = [
        "name" ,
        "email" ,
        "phone" ,
        "image" ,
        "birth_date" ,
        "address",
        "gender" ,
        "status" ,
        "receive_email" ,
        "google_id" ,
        "facebook_id" ,
        "apple_id" ,
        "sign_from" ,
        "password" ,
        "country_id" ,
        "city_id" ,
        "region_id" ,
        "code"
    ] ;


    protected function getImageUrlAttribute(){
        $path = asset('uploads/users_images');

        return  is_null($this->image) ? $path.'/default.png':$path .'/'.$this->image;
    }







    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }


    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    /////////////////////////////////////////////////////////// Relationships ///////////////////////////////
    public function addresses()
    {
        return $this->hasMany(UserAddress::class , "user_id");
    }

}
