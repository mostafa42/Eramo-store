<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMedia extends Model
{
    use HasFactory;

    protected $guarded = [];



    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    protected $appends =['image_url' ];


    protected function getImageUrlAttribute(){
        $path = asset('uploads/products_images');

        return  is_null($this->image) ? $path.'/default.png':$path .'/'.$this->image;
    }
}
