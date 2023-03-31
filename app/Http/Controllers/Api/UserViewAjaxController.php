<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\City;
use App\Models\CompareList;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UserViewAjaxController extends Controller
{
    public function get_city($country_id)
    {
        $cities = City::where("country_id", $country_id)->with("country", "regions")->get();
        return $cities;
    }

    public function get_region($city_id)
    {
        $region = Region::where("city_id", $city_id)->get();
        return $region;
    }

    public function get_product($id)
    {
        $product = Product::where("id", $id)->first();

        return $product;
    }

    public function filter_by_price($start_price, $end_price, $term , Request $request)
    {
        $products = Product::where("title_en", 'LIKE', '%' . $term . '%' )
            ->orWhere("title_ar", 'LIKE', '%' . $term . '%')
            ->orWhere("slug_ar", 'LIKE', '%' . $term . '%')
            ->orWhere("slug_en", 'LIKE', '%' . $term . '%')
            ->get();

        $data = [] ;
        $final_array = [] ;

        if( count($request->brands) > 0 ){
            if( count($products) > 0 ){
                foreach( $products as $product ){
                    if( in_array($product->category_id , $request->brands ) ){
                        $data[] = $product ;
                    }
                }
            }

            if ($start_price == 0 && $end_price == 10000000000) {
                return $data ;
            }else{
                if( count($data) > 0 ){
                    foreach( $data as $product_item ){
                        if ($product_item->real_price <= $end_price && $product_item->real_price >= $start_price) {
                            $final_array[] = $product_item;
                        }
                    }
                    return $final_array ;
                }
            }
        }else{
            if ($start_price == 0 && $end_price == 10000000000) {
                return $data ;
            }else{
                if( count($data) > 0 ){
                    foreach( $products as $product_item ){
                        if ($product_item->real_price <= $end_price && $product_item->real_price >= $start_price) {
                            $final_array[] = $product_item;
                        }
                    }
                    return $final_array ;
                }
            }
        }


    }

    public function add_to_wish_list($product_id)
    {
        // check if user guest or auth
        if (auth()->user()) {
            // auth
        } else {
            // guest
            // check if this is guest before or not

            $guest_value = \Request::ip();

            if ($guest_value) {
                // check if this product is exist
                $exist = CompareList::where([
                    ["user_id", $guest_value],
                    ["product_id", $product_id]
                ])->first();
                if ($exist) {
                    $exist->delete();
                    return "deleted";
                } else {
                    $new_compare_item = CompareList::create([
                        "user_id" => $guest_value,
                        "product_id" => $product_id
                    ]);
                    return "created";
                }
            } else {
                $new_compare_item = CompareList::create([
                    "user_id" => $guest_value,
                    "product_id" => $product_id
                ]);
                return "created";
            }



        }
    }

    public function add_to_cart($product_id)
    {
        // check if user guest or auth
        if (auth()->user()) {
            // auth
        } else {
            // guest
            // check if this is guest before or not

            $guest_value = \Request::ip();

            if ($guest_value) {
                // check if this product is exist
                $exist = Cart::where([
                    ["user_id" , $guest_value] ,
                    ["product_id", $product_id]
                ])->first();

                if ($exist) {
                    $exist->update([
                        "quantity" => $exist->quantity + 1
                    ]);
                } else {
                    $new_cart_item = Cart::create([
                        "user_id" => $guest_value,
                        "product_id" => $product_id ,
                        "quantity" => 1
                    ]);
                }
            } else {
                $new_cart_item = Cart::create([
                    "user_id" => $guest_value,
                    "product_id" => $product_id ,
                    "quantity" => 1
                ]);
            }

            $all_cart = Cart::with("product")->where("user_id" , $guest_value)->latest()->get();

            return $all_cart ;



        }
    }

    public function empty_cart_after_counter_down()
    {
        if( auth()->user() ){
            $allcart = Cart::where("user_id" , auth()->user()->id )->get();
            if( count($allcart) > 0 ){
                foreach ( $allcart as $item ){
                    $item->delete();
                }
            }
        }else{
            $allcart = Cart::where("user_id" , \Request::ip() )->get();
            if( count($allcart) > 0 ){
                foreach ( $allcart as $item ){
                    $item->delete();
                }
            }
        }

        return "done" ;
    }
}
