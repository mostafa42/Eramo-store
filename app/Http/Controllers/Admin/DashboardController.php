<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Product;
use App\Models\PromoCode;
use App\Models\Tax;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{





    public function index(Request $request){
        // return Auth::guard('web')->user();

        $user = User::count() ;
        $admin = Admin::count() ;
        $all_products = Product::count();
        $in_stock_products = Product::inStock()->count() ;
        $out_stock_products = Product::outOfStock()->count() ;
        $promo_codes = PromoCode::count();
        $taxes = Tax::count();

        return \view('admin.Dashboard' , compact('user' , 'admin' , 'all_products' , 'in_stock_products' , 'out_stock_products' , 'promo_codes' , 'taxes'));
    }
}
