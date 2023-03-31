<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Country;
use App\Models\MainSectionFooter;
use App\Models\MyAccountSectionFooter;
use App\Models\StoreInformationFooter;
use App\Models\WhyWeChooseFooter;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        // check if user auth or guest 
        if (auth()->user()) {
            // main section footer
            $main_section_footer = MainSectionFooter::get();

            // my account section footer
            $my_account_section = MyAccountSectionFooter::get();

            // why we choose
            $why_we_choose = WhyWeChooseFooter::get();

            // store information
            $store_info = StoreInformationFooter::get();

            // user 
            $user = auth()->user() ;

            // countries 
            $countries = Country::get(); 

            // my cart
            $cart = Cart::where("user_id" , auth()->user()->id )->latest()->get() ;
            
            return view('user.layout.checkout' , compact('user' , 'countries' , 'cart' , 'main_section_footer' , 'my_account_section' , 'why_we_choose' , 'store_info'));
        } else {
            return redirect('/login');
        }
    }
}
