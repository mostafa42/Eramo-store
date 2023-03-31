<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Cart;
use App\Models\ContactMessage;
use App\Models\ContactUs;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\TermsAndConditions;
use App\Models\Wishlist;
use Faker\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class HomeController extends Controller
{
    public function categories()
    {
        $categories = ProductCategory::latest()->get();
        return response($categories);
    }

    public function get_category($slug)
    {
        $category = ProductCategory::with("sub_catagories")->where(["slug_ar" => $slug])->orWhere(["slug_en" => $slug])->first();

        if (!$category) {
            return response()->json(["errors" => "invalid catgeory"], 404);
        }
        return response($category);
    }

    public function latest_products()
    {

        $latest_products = Product::select('real_price', 'purchase_price', 'title_en', 'title_ar', 'slug_en', 'slug_ar')->latest()->take(4)->get();

        return response($latest_products);
    }

    public function all_products()
    {
        $products = Product::get();

        return response($products);
    }

    public function get_product($slug)
    {
        $product = Product::where(["slug_ar" => $slug])->orWhere(["slug_en" => $slug])->orWhere(["id" => $slug])->first();

        if (!$product) {
            return response()->json(["errors" => "invalid product"], 404);
        }
        return response($product);
    }

    // cart functionality
    public function add_to_cart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "cart" => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 404);
        }

        // looping throught cart
        foreach (json_decode($request->cart) as $item) {
            $arr = [];
            // validat product
            $product = Product::find($item->product_id);

            if (!$product) {
                return response()->json(["errors" => "product not found !"], 404);
            }

            // validate quantity
            if ($item->quantity <= 0) {
                return response()->json(["errors" => "invalid quantity !"], 404);
            }

            $arr["user_id"] = Auth::user()->id;
            $arr["product_id"] = $item->product_id;
            $arr["quantity"] = $item->quantity;

            // check if this user added this product or not
            $check = Cart::where([["user_id", $arr["user_id"]], ["product_id", $arr["product_id"]]])->first();

            if ($check) {
                $check->update([
                    "quantity" => $check->quantity + $arr["quantity"]
                ]);
            } else {
                // saving data to cart
                $cart = Cart::create([
                    "quantity" => $arr["quantity"],
                    "user_id" => $arr["user_id"],
                    "product_id" => $arr["product_id"]
                ]);
            }
        }

        return response()->json(["msg" => "added to cart successfully !"], 200);
    }

    public function my_cart()
    {
        $my_cart = Cart::with("product")->where("user_id", Auth::user()->id)->get();

        $total_price = 0 ;
        $total_taxes = 0 ;

        foreach( $my_cart as $item ){
            if( count($item->product["taxes"]) > 0 ){
                foreach ($item->product["taxes"] as $tax) {
                    if ($tax->status == 1) {
                        $total_taxes += $item->product->real_price * ($tax->percentage / 100);
                    }
                }
            }

            $total_price += $item->product['real_price'] * $item->quantity ;
        }

        // total price and taxes
        $total_price += $total_taxes ;
        return response()->json(["cart" => $my_cart , "total_price" => $total_price]);
    }

    public function delete_item_from_cart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "item_id" => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 404);
        }

        $check = Cart::find($request->item_id);
        if (!$check) {
            return response()->json(["errors" => "item not found ! "], 404);
        }

        $check->delete();
        return response()->json(["msg" => "item deleted successfully"]);
    }

    public function empty_cart()
    {
        $cart = Cart::where("user_id", Auth::user()->id)->get();
        foreach ($cart as $item) {
            $item->delete();
        }

        return response()->json(["msg" => "cart is empty"]);
    }

    // wishlist functionality
    public function add_remove_item_wishlist(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "products" => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 404);
        }

        // check if this product is exist
        foreach (json_decode($request->products) as $product) {
            $exist = Product::find($product);
            if (!$exist) {
                return response()->json(["errors" => "product not found !"], 404);
            }

            // check if found to remove it
            $remove_item = Wishlist::where([["user_id", Auth::user()->id], ["product_id", $product]])->first();
            if ($remove_item) {
                $remove_item->delete();
            } else {
                // creating new item inside wishlist
                $wishlist = Wishlist::create([
                    "product_id" => $product,
                    "user_id" => Auth::user()->id
                ]);
            }
        }

        return response()->json(["msg" => "wishlist updated successfully ! "]);
    }

    public function my_wishlist()
    {
        $wishlist = Wishlist::with("product")->where("user_id", Auth::user()->id)->get();

        return response($wishlist);
    }

    public function empty_wishlist()
    {
        $wishlist = Wishlist::where("user_id", Auth::user()->id)->get();
        foreach ($wishlist as $item) {
            $item->delete();
        }

        return response()->json(["msg" => "wishlist is empty"]);
    }

    public function home_page_search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'key' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 404);
        }

        $products = Product::where("title_en", 'LIKE', '%' . $request->key . '%')
        ->orWhere("title_ar", 'LIKE', '%' . $request->key . '%')
        ->orWhere("slug_ar", 'LIKE', '%' . $request->key . '%')
        ->orWhere("slug_en", 'LIKE', '%' . $request->key . '%')
        ->get();


        return response($products);
    }

    public function terms_and_conditions()
    {
        $terms_and_conditions = TermsAndConditions::get() ;
        return response($terms_and_conditions);
    }

    public function contact_us()
    {
        $contact_us = ContactUs::get() ;
        return response($contact_us) ;
    }

    public function send_message(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => 'required' ,
            "email" => 'required|email' ,
            "phone" => 'required|min:10' ,
            "subject" => 'required' ,
            "message" => 'required' ,
            "iam_not_robot" => 'required|in:true,false'
        ]);

        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 404);
        }

        if( $request->iam_not_robot != true ){
            return response()->json(["errors" => "you not confirm i am not robot checker"] , 404);
        }

        $contact_us_message = ContactMessage::create([
            "name" => $request->name ,
            "email" => $request->email ,
            "phone" => $request->phone ,
            "subject" => $request->subject ,
            "message" => $request->message ,
            "ip_address" => $request->ip()
        ]);

        return response()->json(["msg" => "message is sent !"]);
    }

    public function about_us()
    {
        $about_us = AboutUs::get();
        return response($about_us);
    }

    public function send_query(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "fullname" => 'required' ,
            "email" => 'required|email',
            "phone" => 'required|min:10',
            "message" => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 404);
        }
        return $request ;
    }
}
