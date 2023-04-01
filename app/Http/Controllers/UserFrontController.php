<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFront\AddMainSliderRequest;
use App\Http\Requests\UserFront\FirstAdvsRequest;
use App\Http\Requests\UserFront\MainSectionFooterRequest;
use App\Http\Requests\UserFront\MainSliderRequest;
use App\Http\Requests\UserFront\MyAccountRequest;
use App\Http\Requests\UserFront\NavbarRequest;
use App\Http\Requests\UserFront\OurFeaturesRequest;
use App\Http\Requests\UserFront\ProductTopAdvRequest;
use App\Http\Requests\UserFront\ProductUnderAdvRequest;
use App\Http\Requests\UserFront\SecondAdvsRequest;
use App\Http\Requests\UserFront\StoreInfoRequest;
use App\Http\Requests\UserFront\TopNavbarRequest;
use App\Models\FirstAdv;
use App\Models\MainSectionFooter;
use App\Models\MainSlider;
use App\Models\MyAccountSectionFooter;
use App\Models\Navbar;
use App\Models\OurFeature;
use App\Models\ProductTopAdv;
use App\Models\ProductUnderAdv;
use App\Models\SecondAdvs;
use App\Models\StoreInformationFooter;
use App\Models\TopNavbar;
use App\Models\WhyWeChooseFooter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserFrontController extends Controller
{
    public function index_top_bar()
    {
        $top_navbar = TopNavbar::get();

        return view('admin.userFrontSettings.top_bar_index', compact('top_navbar'));
    }

    public function edit_top_bar($id, TopNavbarRequest $request)
    {
        $top_navbar = TopNavbar::find($id)->update($request->all());
        return redirect('acp/user-front-settings/top-navbar');
    }

    public function index_navbar()
    {
        $navbar = Navbar::get();
        return view('admin.userFrontSettings.navbar', compact('navbar'));
    }

    public function edit_bar(NavbarRequest $request, $id)
    {
        $navbar = Navbar::find($id);

        if ($request->image) {
            $fileImage = $request->file('image');
            $Imagename = date('YmdHi') . $fileImage->getClientOriginalName();
            $fileImage->move(public_path('uploads/user_front/navbar'), $Imagename);
        }

        $navbar->update([
            "logo" => $request->image ? "uploads/user_front/navbar/" . $Imagename  : $navbar->logo,
            "call_us" => $request->call_us
        ]);

        return redirect('acp/user-front-settings/navbar');
    }

    public function main_slider()
    {
        $main_sliders = MainSlider::get();
        return view('admin.userFrontSettings.main_slider', compact('main_sliders'));
    }

    public function store_main_slider(AddMainSliderRequest $request)
    {
        $fileImage = $request->file('main_image');
        $Imagename = date('YmdHi') . $fileImage->getClientOriginalName();
        $fileImage->move(public_path('uploads/user_front/main_slider/'), $Imagename);


        MainSlider::create([
            "main_image" => "uploads/user_front/main_slider/" . $Imagename,
            "intro_title" => $request->intro_title,
            "big_text" => $request->big_text,
            "description" => $request->description,
            "link" => $request->link,
        ]);

        return redirect('acp/user-front-settings/main-sliders');
    }

    public function edit_main_slider(MainSliderRequest $request, $id)
    {
        if ($request->main_image) {
            $fileImage = $request->file('main_image');
            $Imagename = date('YmdHi') . $fileImage->getClientOriginalName();
            $fileImage->move(public_path('uploads/user_front/main_slider/'), $Imagename);
        }

        $main_slider = MainSlider::first();

        $main_slider->update([
            "main_image" => $request->main_image ? "uploads/user_front/main_slider/" . $Imagename  : $main_slider->main_image,
            "intro_title" => $request->intro_title,
            "big_text" => $request->big_text,
            "description" => $request->description,
            "link" => $request->link,
        ]);

        return redirect('acp/user-front-settings/main-sliders');
    }

    public function first_advs_index()
    {
        $first_advs = FirstAdv::latest()->get();
        return view('admin.userFrontSettings.first_advs', compact('first_advs'));
    }

    public function edit_first_advs(FirstAdvsRequest $request, $id)
    {
        if ($request->main_image) {
            $fileImage = $request->file('main_image');
            $Imagename = date('YmdHi') . $fileImage->getClientOriginalName();
            $fileImage->move(public_path('uploads/user_front/first_advs/'), $Imagename);
        }

        $first_adv = FirstAdv::find($id);

        $first_adv->update([
            "main_image" => $request->main_image ? "uploads/user_front/first_advs/" . $Imagename  : $first_adv->main_image,
            "small_text" => $request->small_text,
            "big_text" => $request->big_text,
            "link" => $request->link,
        ]);

        return redirect('acp/user-front-settings/first-advs');
    }

    public function second_advs_index()
    {
        $second_advs = SecondAdvs::latest()->get();
        return view('admin.userFrontSettings.second_advs', compact('second_advs'));
    }

    public function edit_second_advs(SecondAdvsRequest $request, $id)
    {
        if ($request->image) {
            $fileImage = $request->file('image');
            $Imagename = date('YmdHi') . $fileImage->getClientOriginalName();
            $fileImage->move(public_path('uploads/user_front/second_advs/'), $Imagename);
        }

        $second_adv = SecondAdvs::find($id);

        $second_adv->update([
            "image" => $request->image ? "uploads/user_front/second_advs/" . $Imagename  : $second_adv->image,
            "link" => $request->link
        ]);

        return redirect('acp/user-front-settings/second-advs');
    }

    public function our_features()
    {
        $our_features = OurFeature::get();

        return view('admin.userFrontSettings.our_features', compact('our_features'));
    }
    // R@$toRe2023GbASo
    public function edit_our_feature(OurFeaturesRequest $request, $id)
    {
        if ($request->icon) {
            $fileImage = $request->file('icon');
            $Imagename = date('YmdHi') . $fileImage->getClientOriginalName();
            $fileImage->move(public_path('uploads/user_front/our_features/'), $Imagename);
        }

        $our_feature = OurFeature::find($id);

        $our_feature->update([
            "icon" => $request->icon ? "uploads/user_front/our_features/" . $Imagename  : $our_feature->icon,
            "title" => $request->title,
            "sub_title" => $request->sub_title
        ]);

        return redirect('acp/user-front-settings/our-features');
    }

    public function main_section_footer_footer()
    {
        $main_section = MainSectionFooter::get();
        return view("admin.userFrontSettings.footer.main_section", compact('main_section'));
    }

    public function edit_main_section_footer_footer(MainSectionFooterRequest $request, $id)
    {
        if ($request->logo) {
            $fileImage = $request->file('logo');
            $Imagename = date('YmdHi') . $fileImage->getClientOriginalName();
            $fileImage->move(public_path('uploads/user_front/footer/'), $Imagename);
        }

        $main_section = MainSectionFooter::first();

        $main_section->update([
            "logo" => $request->logo ? "uploads/user_front/footer/" . $Imagename  : $main_section->logo,
            "description" => $request->description,
            "google_play_link" => $request->google_play_link,
            "apple_store_link" => $request->apple_store_link
        ]);

        return redirect('acp/user-front-settings/main-section-footer');
    }

    public function my_account_footer()
    {
        $my_account_section = MyAccountSectionFooter::get();
        return view("admin.userFrontSettings.footer.my_account", compact('my_account_section'));
    }

    public function edit_my_account_footer(MyAccountRequest $request, $id)
    {
        $my_account_section = MyAccountSectionFooter::find($id);

        $my_account_section->update([
            "title_en" => $request->title_en,
            "title_ar" => $request->title_ar,
            "link_en" => $request->link_en,
            "link_ar" => $request->link_ar,
        ]);

        return redirect('acp/user-front-settings/my-account-footer');
    }

    public function why_we_choose_footer()
    {
        $why_we_choose = WhyWeChooseFooter::get();
        return view('admin.userFrontSettings.footer.why_we_choose_section', compact('why_we_choose'));
    }

    public function edit_why_we_choose_footer(MyAccountRequest $request, $id)
    {
        $why_we_choose = WhyWeChooseFooter::find($id);

        $why_we_choose->update([
            "title_en" => $request->title_en,
            "title_ar" => $request->title_ar,
            "link_en" => $request->link_en,
            "link_ar" => $request->link_ar,
        ]);

        return redirect('acp/user-front-settings/why-we-choose-footer');
    }

    public function store_info_footer()
    {
        $store_info = StoreInformationFooter::get();
        return view('admin.userFrontSettings.footer.store_info', compact('store_info'));
    }

    public function edit_store_info_footer(StoreInfoRequest $request, $id)
    {
        $store_info = StoreInformationFooter::first();
        $store_info->update($request->all());

        return redirect('acp/user-front-settings/store-info-footer');
    }

    public function top_adv_product_details(Request $request)
    {
        $top_adv = ProductTopAdv::get();
        return view('admin.userFrontSettings.product_top_adv', compact('top_adv'));
    }

    public function edit_top_adv_product_details(ProductTopAdvRequest $request, $id)
    {
        $top_adv = ProductTopAdv::first();
        $top_adv->update();
        if ($request->main_image) {
            $fileImage = $request->file('main_image');
            $Imagename = date('YmdHi') . $fileImage->getClientOriginalName();
            $fileImage->move(public_path('uploads/user_front/product_page/'), $Imagename);
        }

        $top_adv->update([
            "main_image" => $request->main_image ? "uploads/user_front/product_page/" . $Imagename  : $top_adv->main_image,
            "link" => $request->link,
            "title" => $request->title,
            "description" => $request->description
        ]);

        return redirect('acp/user-front-settings/top-adv-product-details');
    }

    public function under_adv_product_details(Request $request)
    {
        $under_adv = ProductUnderAdv::get();
        return view('admin.userFrontSettings.product_under_adv', compact('under_adv'));
    }

    public function edit_under_adv_product_details(ProductUnderAdvRequest $request, $id)
    {
        $under_adv = ProductUnderAdv::first();
        $under_adv->update();
        if ($request->image) {
            $fileImage = $request->file('image');
            $Imagename = date('YmdHi') . $fileImage->getClientOriginalName();
            $fileImage->move(public_path('uploads/user_front/product_page/'), $Imagename);
        }

        $under_adv->update([
            "image" => $request->image ? "uploads/user_front/product_page/" . $Imagename  : $under_adv->image,
            "link" => $request->link
        ]);

        return redirect('acp/user-front-settings/under-adv-product-details');
    }
}
