<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class AppSetting extends Model
{

    protected $guarded = [];

    use HasFactory;



    protected $appends =
    [
        'title' ,
        'nickname' ,
        'slogan',
        'summary',
        'keywords',
        'description',
        'logo_url',
        'logo_light_url',


    ];

    protected function getLogoUrlAttribute(){
        $path = asset('uploads/app');

        return  is_null($this->logo) ? $path.'/logo.png':$path .'/'.$this->logo;
    }

    protected function getLogoLightUrlAttribute(){
        $path = asset('uploads/app');

        return  is_null($this->logo_light) ? $path.'/logo_light.png':$path .'/'.$this->logo_light;
    }



    protected function getTitleAttribute(){
        $val = 'title_'.app()->getLocale();

        return  $this->$val;

    }

    protected function getNicknameAttribute(){
        $val = 'nickname_'.app()->getLocale();

        return  $this->$val;

    }

    protected function getSloganAttribute(){
        $val = 'slogan_'.app()->getLocale();

        return  $this->$val;

    }


    protected function getSummaryAttribute(){
        $val = 'summary_'.app()->getLocale();

        return  $this->$val;

    }

    protected function getKeywordsAttribute(){
        $val = 'keywords_'.app()->getLocale();

        return  $this->$val;

    }

    protected function getDescriptionAttribute(){
        $val = 'description_'.app()->getLocale();
        return  $this->$val;
    }





    protected function  emails(): Attribute
    {
        return Attribute::make(
            get: fn ($value) =>explode(',', $value),
        );
    }

    protected function  faxes(): Attribute
    {
        return Attribute::make(
            get: fn ($value) =>explode(',', $value),
        );
    }


    protected function  phoneNumbers(): Attribute
    {
        return Attribute::make(
            get: fn ($value) =>explode(',', $value),
        );
    }


    protected function  addressAr(): Attribute
    {
        return Attribute::make(
            get: fn ($value) =>explode(',', $value),
        );
    }

    protected function  addressEn(): Attribute
    {
        return Attribute::make(
            get: fn ($value) =>explode(',', $value),
        );
    }

}
