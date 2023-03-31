<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CompareList;
use App\Models\MainSectionFooter;
use App\Models\MyAccountSectionFooter;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductTopAdv;
use App\Models\ProductUnderAdv;
use App\Models\StoreInformationFooter;
use App\Models\WhyWeChooseFooter;
use Illuminate\Http\Request;

class MainFunctionalityController extends Controller
{
    public function search(Request $request)
    {
        if( $request->term == "" ){
            return view('user.auth_user.not_found') ;
        }else{
            $matching = Product::where("title_en", 'LIKE', '%' . $request->term . '%')
            ->orWhere("title_ar", 'LIKE', '%' . $request->term . '%')
            ->orWhere("slug_ar", 'LIKE', '%' . $request->term . '%')
            ->orWhere("slug_en", 'LIKE', '%' . $request->term . '%')
            ->get();

            $first_three_new_products = Product::latest()->limit(3)->get();
            $last_three_new_products = Product::first()->limit(3)->get();

            // main section footer
            $main_section_footer = MainSectionFooter::get();

            // my account section footer
            $my_account_section = MyAccountSectionFooter::get();

            // why we choose
            $why_we_choose = WhyWeChooseFooter::get() ;

            // store information
            $store_info = StoreInformationFooter::get();

            if( $matching->count() > 0 ){
                $top_adv = ProductTopAdv::get() ;
                $under_adv = ProductUnderAdv::get() ;
                $brands = ProductCategory::sub()->get();
                $term = $request->term ;
                return view('user.auth_user.search' , compact('term' , 'matching' , 'top_adv' , 'under_adv' , 'brands' , 'first_three_new_products' , 'last_three_new_products', 'main_section_footer' , 'my_account_section' , 'why_we_choose' , 'store_info')) ;
            }else{
                return view('user.auth_user.not_found') ;
            }
        }



    }

    public function compare()
    {
        // main section footer
        $main_section_footer = MainSectionFooter::get();

        // my account section footer
        $my_account_section = MyAccountSectionFooter::get();

        // why we choose
        $why_we_choose = WhyWeChooseFooter::get() ;

        // store information
        $store_info = StoreInformationFooter::get();

        if( auth()->user() ){
            $compare_list = CompareList::where("user_id" , auth()->user()->id )->with("product")->get();
            return view('user.layout.compare' , compact('compare_list' , 'main_section_footer' , 'my_account_section' , 'why_we_choose' , 'store_info'));
        }else{
            $compare_list = CompareList::where("user_id" , \Request::ip())->with("product")->get();
            return view('user.layout.compare' , compact('compare_list' , 'main_section_footer' , 'my_account_section' , 'why_we_choose' , 'store_info'));
        }
    }

    public function cart()
    {
        // main section footer
        $main_section_footer = MainSectionFooter::get();

        // my account section footer
        $my_account_section = MyAccountSectionFooter::get();

        // why we choose
        $why_we_choose = WhyWeChooseFooter::get() ;

        // store information
        $store_info = StoreInformationFooter::get();

        if( auth()->user() ){
            $cart_list = Cart::where("user_id" , auth()->user()->id )->with("product")->latest()->get();
            return view('user.layout.cart' , compact('cart_list' , 'main_section_footer' , 'my_account_section' , 'why_we_choose' , 'store_info'));
        }else{
            $cart_list = Cart::where("user_id" , \Request::ip())->with("product")->latest()->get();
            // return Product::get() ;
            return view('user.layout.cart' , compact('cart_list' , 'main_section_footer' , 'my_account_section' , 'why_we_choose' , 'store_info'));
        }
    }

    public function delete_item_compare($id)
    {
        $item = CompareList::find($id) ;
        if( $item ){
            $item->delete();
            return redirect()->back();
        }else{
            return view('user.auth_user.not_found');
        }
    }

    public function delete_item_cart($id)
    {
        $item = Cart::find($id) ;
        if( $item ){
            $item->delete();
            return redirect()->back();
        }else{
            return view('user.auth_user.not_found');
        }
    }
}
