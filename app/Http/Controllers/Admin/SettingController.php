<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Services\SettingService;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{

  protected $settingServices;
  public function __construct(SettingService $settingServices){

        $this->settingServices = $settingServices;
        $this->middleware(['permission:settings-read'])->only(['index','export']);
        $this->middleware(['permission:settings-create'])->only(['create', 'store']);
        $this->middleware(['permission:settings-update'])->only(['update', 'edit']);
        $this->middleware(['permission:settings-delete'])->only(['destroy']);
  }


  public function index( Request $request){


    $settings =$this->settingServices->getSettings();

    // return $settings;
    return \view('admin.setting.index' ,\compact('settings'));
}





public function update(Request $request)
{

    $request->validate([
        'title_ar'=>['nullable','string','min:2' ],
        'title_en'=>['nullable','string','min:2'],
        'nickname_ar'=>['nullable','string','min:2' ],
        'nickname_en'=>['nullable','string','min:2'],
        'slogan_ar'=>['nullable','string','min:2' ],
        'slogan_en'=>['nullable','string','min:2'],
        'summary_ar'=>['nullable','string','min:2' ],
        'summary_en'=>['nullable','string','min:2'],
        'currency_name_ar'=>['nullable','string','min:2' ],
        'currency_name_en'=>['nullable','string','min:2'],

        'emails'=>['nullable','string','min:2' ],
        'faxes'=>['nullable','string','min:2'],
        'phone_numbers'=>['nullable','string','min:2' ],
        'address_ar'=>['nullable','string','min:2'],
        'address_en'=>['nullable','string','min:2' ],
        'map_latitude'=>['nullable','string','min:2'],
        'map_longitude'=>['nullable','string','min:2' ],

        'map_iframe'=>['nullable','string','min:2' ],

        'facebook_link'=>['nullable','url',],
        'instagram_link'=>['nullable','url',],
        'twitter_link'=>['nullable','url',],
        'youtube_link'=>['nullable','url',],
        'tiktok_link'=>['nullable','url',],
        'linkedin_link'=>['nullable','url',],
        'pinterest_link'=>['nullable','url',],


        'keywords_ar'=>['nullable','string','min:2'],
        'keywords_en'=>['nullable','string','min:2'],
        'description_ar'=>['nullable','string','min:2'],
        'description_en'=>['nullable','string','min:2'],

        'youtube_video_link'=>['nullable','url', 'regex:/^(?:https?:\/\/)?(?:m\.|www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/i'],
        'logo'=>['nullable','image','max:10240'],
        'logo_light'=>['nullable','image','max:10240'],

        'verification_banner'=>['nullable','image','max:10240'],
        
        'status'=>['nullable','string', Rule::in([1,0])],

        'description_verification_ar'=>['nullable','string','min:2'],
        'description_verification_en'=>['nullable','string','min:2'],

        'text_verification_ar'=>['nullable','string','min:2'],
        'text_verification_en'=>['nullable','string','min:2'],
    ]);

    $updated = $this->settingServices->update($request);

    if($updated){
        $request->session()->flash('success', 'Settings Updated SuccessFully');

    }else{
        $request->session()->flash('failed', 'Something Wrong');
    }


     return redirect()->back();


}



}
