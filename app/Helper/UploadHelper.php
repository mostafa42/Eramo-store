<?php

namespace App\Helper;

use Intervention\Image\Facades\Image;


class UploadHelper
{
public static function upload( $fileDir , $file , $width=null , $height =null, ) {


    $dir = 'uploads/' . $fileDir .'/';
    $oldImage =  $file;
    $newImage = $file->hashName();
    Image::make($oldImage)->resize($width, $height, function ($constraint) {
        $constraint->aspectRatio();
    })->save($dir .$newImage ,100);


    return $newImage;
}
}


























