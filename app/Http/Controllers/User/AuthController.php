<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Auth\LoginRequest;
use App\Http\Requests\User\Auth\SignUpRequest;
use App\Http\Requests\User\Home\UpdateProfileRequest;
use App\Http\Requests\User\Home\UpdateShippingAddressRequest;
use App\Models\Admin;
use App\Models\Cart;
use App\Models\CompareList;
use App\Models\Country;
use App\Models\FirstAdv;
use App\Models\MainSectionFooter;
use App\Models\MainSlider;
use App\Models\MyAccountSectionFooter;
use App\Models\OurFeature;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\SecondAdvs;
use App\Models\StoreInformationFooter;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\WhyWeChooseFooter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('user.login');
    }

    public function sign_in(LoginRequest $request)
    {
        $credentials = $request->all('email' , 'password');

        if( !Auth::validate($credentials) ){
            return redirect()->back()->withErrors(["error" => "invalid credentials !"]);
        }

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        // check if he has compare list details
        $compare_list = CompareList::where("user_id" , $request->ip())->get();

        if( count($compare_list) > 0 ){
            foreach( $compare_list as $item ){
                $item->update([
                    "user_id" => auth()->user()->id
                ]);
            }
        }

        // check if he has cart
        $my_cart = Cart::where("user_id" , $request->ip())->get();

        if( count($my_cart) > 0 ){
            foreach( $my_cart as $item ){
                $item->update([
                    "user_id" => auth()->user()->id
                ]);
            }
        }



        // return auth()->user() ;
        return redirect('/user');
    }

    public function sign_up()
    {
        $countries = Country::get();

        return view('user.signUp', compact('countries'));
    }

    public function register(SignUpRequest $request)
    {

        $input = $request->all();

        $input['password'] = bcrypt($input['password']);
        $input['sign_from'] = 'web';

        $user = User::create($input);

        auth()->login($user);

        // check if he has compare list details
        $compare_list = CompareList::where("user_id" , $request->ip())->get();

        if( count($compare_list) > 0 ){
            foreach( $compare_list as $item ){
                $item->update([
                    "user_id" => auth()->user()->id
                ]);
            }
        }

        // check if he has cart
        $my_cart = Cart::where("user_id" , $request->ip())->get();

        if( count($my_cart) > 0 ){
            foreach( $my_cart as $item ){
                $item->update([
                    "user_id" => auth()->user()->id
                ]);
            }
        }

        return redirect('/user');
    }

    public function auth_home()
    {
        // getting all categories
        $categories = ProductCategory::latest()->main()->get();
        // getting first two categories
        // $first_two_categories = ProductCategory::with("products")->limit(2)->get();
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
        return view('user.auth_user.home', compact(
            'categories',
            'first_two_categories',
            'lowest_price',
            'main_sliders',
            'first_advs',
            'second_advs',
            'our_features',
            'admins',
            'main_section_footer',
            'my_account_section',
            'why_we_choose',
            'store_info'
        ));
    }

    public function profile()
    {
        $user = auth()->user() ;

        $countries = Country::get();


        $address = UserAddress::where("user_id" , $user->id)->first();



        return view('user.auth_user.profile' , compact('user' , 'countries' , 'address'));
    }

    public function update_profile(UpdateProfileRequest $request)
    {
        // return $request ;
        auth()->user()->update($request->all('email' , 'name' , 'phone'));

        return redirect()->back();
    }

    public function update_shipping_address(UpdateShippingAddressRequest $request)
    {
        $request["user_id"] = auth()->user()->id ;

        // check if exist
        $address = UserAddress::where("user_id" , auth()->user()->id)->first();
        if( $address ){
            $address->update($request->all('user_id' , 'flat' , 'country_id' , 'city_id' , 'zip_code' , 'address'));
        }else{
            UserAddress::create($request->all('user_id' , 'flat' , 'country_id' , 'city_id' , 'zip_code' , 'address'));
        }

        return redirect('/profile');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login') ;
    }
}
