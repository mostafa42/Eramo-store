<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\City;
use App\Models\FirstAdv;
use App\Models\MainSectionFooter;
use App\Models\MainSlider;
use App\Models\MyAccountSectionFooter;
use App\Models\OurFeature;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\SecondAdvs;
use App\Models\StoreInformationFooter;
use App\Models\WhyWeChooseFooter;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $cities=City::get();
        // getting all categories
        $categories = ProductCategory::latest()->main()->get();

        // getting first two categories
        $first_two_categories = ProductCategory::main()->with(["sub_catagories" => function ($sub) {
            $sub->sub()->with("products");
        }])->limit(2)->get();


        // lowest price
        $lowest_price = Product::orderBy('real_price', 'asc')->limit(6)->get();

        // main slider
        $main_sliders = MainSlider::latest()->get();

        // first advs
        $first_advs = FirstAdv::latest()->get();

        // second advs
        $second_advs = SecondAdvs::latest()->get();

        // our features
        $our_features = OurFeature::get();

        // getting last two categories
        $last_two_categories = ProductCategory::main()->latest()->with(["sub_catagories" => function ($sub) {
            $sub->sub()->with("products");
        }])->limit(2)->get();

        // our admins
        $admins = Admin::latest()->get();

        // footer section
        // main section footer
        $main_section_footer = MainSectionFooter::get();

        // my account section footer
        $my_account_section = MyAccountSectionFooter::get();

        // why we choose
        $why_we_choose = WhyWeChooseFooter::get() ;

        // store information
        $store_info = StoreInformationFooter::get();

        return view('user.index', compact(
            'categories',
            'first_two_categories',
            'lowest_price',
            'main_sliders',
            'first_advs',
            'second_advs',
            'our_features',
            'last_two_categories',
            'admins',
            'main_section_footer',
            'my_account_section',
            'why_we_choose',
            'store_info',
            'cities'
        ));
    }

    public function blogs()
    {
        $blogs=Blog::where('status',1)->orderBy('created_at','desc')->take(4)->get();
        return view('user.blogs', compact('blogs'));
    }

    public function blogDeatils($id)
    {
        $blog=Blog::find($id);
        return view('user.blog_details', compact('blog'));
    }

    public function storeComment(Request $request)
    {
        BlogComment::create([
            'user_id' => auth()->user()->id,
            'blog_id' => $request->blog_id,
            'text_encomment' => $request->text_encomment,
            'status' => 1,
        ]);
        return redirect()->back();
    }

    public function filterWithCity(Request $request)
    {
        $cities=City::get();
        // getting all categories
        $products=Product::where('city_id',$request->city_id)->get();
        $categories = ProductCategory::latest()->main()->get();
        
        // getting first two categories
        $first_two_categories = ProductCategory::main()->with(["sub_catagories" => function ($sub) {
            $sub->sub()->with("products");
        }])->limit(2)->get();


        // lowest price
        $lowest_price = Product::where('city_id',$request->city_id)->orderBy('real_price', 'asc')->limit(6)->get();

        // main slider
        $main_sliders = MainSlider::latest()->get();

        // first advs
        $first_advs = FirstAdv::latest()->get();

        // second advs
        $second_advs = SecondAdvs::latest()->get();

        // our features
        $our_features = OurFeature::get();

        // getting last two categories
        $last_two_categories = ProductCategory::main()->latest()->with(["sub_catagories" => function ($sub) {
            $sub->sub()->with("products");
        }])->limit(2)->get();

        // our admins
        $admins = Admin::latest()->get();

        // footer section
        // main section footer
        $main_section_footer = MainSectionFooter::get();

        // my account section footer
        $my_account_section = MyAccountSectionFooter::get();

        // why we choose
        $why_we_choose = WhyWeChooseFooter::get() ;

        // store information
        $store_info = StoreInformationFooter::get();

        return view('user.index', compact(
            'categories',
            'first_two_categories',
            'lowest_price',
            'main_sliders',
            'first_advs',
            'second_advs',
            'our_features',
            'last_two_categories',
            'admins',
            'main_section_footer',
            'my_account_section',
            'why_we_choose',
            'store_info',
            'cities'
        ));
    }
}
