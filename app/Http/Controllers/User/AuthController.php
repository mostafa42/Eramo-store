<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Auth\LoginRequest;
use App\Http\Requests\User\Auth\SignUpRequest;
use App\Http\Requests\User\Home\UpdateProfileRequest;
use App\Http\Requests\User\Home\UpdateShippingAddressRequest;
use App\Models\Admin;
use App\Models\AppSetting;
use App\Models\Cart;
use App\Models\CompareList;
use App\Models\Country;
use App\Models\FirstAdv;
use App\Models\MainSectionFooter;
use App\Models\MainSlider;
use App\Models\MyAccountSectionFooter;
use App\Models\OrderDetail;
use App\Models\OurFeature;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductColor;
use App\Models\ProductDetails;
use App\Models\ProductMedia;
use App\Models\ProductReview;
use App\Models\ProductSize;
use App\Models\SecondAdvs;
use App\Models\StoreInformationFooter;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\WhyWeChooseFooter;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    public function productDetails($slug)
    {
        $product=Product::find($slug);
        $getProduct=Product::where('slug_ar',$slug)->orWhere('slug_en', $slug)->first();
        $medias=ProductMedia::where('product_id', $getProduct->id)->get();
        $ordersCount=OrderDetail::whereMonth('created_at', Carbon::now()->month)->count();
        $reviews=User::where('status',1)->count();
        $details=ProductDetails::where('product_id', $getProduct->id)->first();
        $sizes=ProductSize::where('product_id', $getProduct->id)->get();
        $colors=ProductColor::where('product_id', $getProduct->id)->get();
        $getprods= DB::table('product_products_with')->where('product_id', $getProduct->id)->pluck('product_with_id');
        $getproducts_with=Product::whereIn('id', $getprods)->get();
        $get2Products=Product::whereIn('id', $getprods)->take(2)->get();
        $reviews=ProductReview::where('product_id',$getProduct->id)->where('status',1)->latest()->paginate(5);
         return view('user.auth_user.product_details',compact('product',
        'medias','getProduct','ordersCount',
            'getproducts_with',
            'reviews','details','sizes','colors','get2Products'));
    }

    public function addToWishList($id)
   {
    $wish=Wishlist::where('product_id', $id)->where('user_id',auth()->user()->id)->first();
    if(isset($wish)){
            $wish->delete();
    }else{
            $wishlist=new Wishlist();
            $wishlist->product_id= $id;
            $wishlist->user_id= auth()->user()->id;
            $wishlist->save();
    }
   }

   public function getUserWishlist()
   {
       $wishlist=Wishlist::where('user_id', auth()->user()->id)->get();
       return view('user.auth_user.wishlist', compact('wishlist'));
   }

   public function storeRatings(Request $request)
    {
        $review=Review::where('user_id', auth()->user()->id)
        ->where('product_id',$request->product_id)->first();
        if(isset($review)){
            return redirect()->back()->withErrors(["error" => "you created review before !"]);
        }else{
        Review::create([
            'user_id'=> auth()->user()->id,
            'product_id' => $request->product_id,
            'name'=>$request->name,
            'subject' => $request->subject,
            'testimonal'=>$request->testimonal,
            'email'=>$request->email
        ]);
        return redirect()->back();
    }
    }

    public function deleteWishlist($id)
    {
        $wishlist=Wishlist::find($id);
        $wishlist->delete();
        return redirect()->back();
    }

    public function verification()
    {
        $settings=AppSetting::first();
        return view('user.verification', compact('settings'));
    }

    public function invoice()
    {
        $settings=AppSetting::first();
        return view('user.auth_user.invoice', compact('settings'));
    }
}
