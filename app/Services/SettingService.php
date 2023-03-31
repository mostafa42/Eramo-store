<?php

namespace App\Services;

use App\Models\AppSetting;
use App\Helper\UploadHelper;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request;


class SettingService
{



    protected $setting;
    public function __construct(AppSetting $setting)
    {

        $this->setting = $setting;

    }




    public function update(Request $request)
    {

        $setting = $this->getSettings();








        $data = $request->only([
            'title_ar',
            'title_en',
            'nickname_ar',
            'nickname_en',
            'slogan_ar',
            'slogan_en',
            'summary_ar',
            'summary_en',



            'emails',
            'faxes',
            'phone_numbers',
            'address_ar',
            'address_en',
            'map_latitude',
            'map_longitude',
            'map_iframe',

            'currency_name_en',
            'currency_name_ar',

            'facebook_link',
            'instagram_link',
            'twitter_link',
            'youtube_link',
            'tiktok_link',
            'linkedin_link',
            'pinterest_link',


            'keywords_ar',
            'keywords_en',
            'description_ar',
            'description_en',
            'status'
        ]);

        $setting->update($data);



        // dd(config('imageDimensions.app_logo'));
        if ($request->hasFile('logo')) {


            if (File::exists(public_path('uploads/app/' . $setting->logo))) {

                Storage::disk('public_uploads')->delete('app/' . $setting->logo);
            }

            $logoName = UploadHelper::upload('app', $request->file('logo'), config('imageDimensions.app_logo.width'), config('imageDimensions.app_logo.height'));

            $setting->logo = $logoName;
        }

        if ($request->hasFile('logo_light')) {


            if (File::exists(public_path('uploads/app/' . $setting->logo_light))) {

                Storage::disk('public_uploads')->delete('app/' . $setting->logo_light);
            }

            $logo_lightName = UploadHelper::upload('app', $request->file('logo_light'), config('imageDimensions.app_logo_light.width'), config('imageDimensions.app_logo_light.height'));

            $setting->logo_light = $logo_lightName;
        }
        $setting->save();

        return $setting ? true : false;


    }

    public function getSettings()
    {
        $setting = $this->setting::get()->first();


        if (!$setting) {
            $setting = $this->setting::create();
        }

        return $setting;

    }




}
