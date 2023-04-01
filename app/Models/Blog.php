<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;
    protected $table='blogs';
    protected $fillable=['image','title_en','title_ar','admin_id',
    'desc_en','desc_ar','status'
];
    protected $appends = ['image'];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    protected function getImageAttribute($value)
    {
        if($value){
        return asset('uploads/blogs_images' . '/' . $value);
        }else{
            return asset('uploads/blogs_images/default.png');
        }
    }
}