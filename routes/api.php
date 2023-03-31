<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserViewAjaxController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('signup' , [AuthController::class , "signup"]);
Route::post('signin' , [AuthController::class , "signin"]);
Route::post("give-me-email", [AuthController::class, "give_me_email"]);
Route::post('validate-code' , [AuthController::class , "validate_code"]);
Route::post('change-password' , [AuthController::class , "change_password"]);


Route::get('categories', [HomeController::class, 'categories']);
Route::get('get-specific-category/{slug}', [HomeController::class, 'get_category']);
Route::get('latest-products', [HomeController::class, 'latest_products']);
Route::get('all-products', [HomeController::class, 'all_products']);
Route::get('get-specific-product/{slug}', [HomeController::class, 'get_product']);
Route::get('home-page-search' , [HomeController::class , 'home_page_search']);
Route::get('terms-and-conditions' , [HomeController::class , "terms_and_conditions"]);
Route::get('contact-us', [HomeController::class, "contact_us"]);
Route::post('send-message' , [HomeController::class , "send_message"]) ;
Route::get('about-us', [HomeController::class, "about_us"]);

Route::middleware('auth:sanctum')->group( function () {
    // routes for authenticated user

    ////////////////////////////////////////////// User Account functionality ////////////////////////////////
    Route::get("my-account" , [AuthController::class , "my_account"]);
    Route::post('update-information' , [AuthController::class , "update_information"]);
    Route::post('update-password' , [AuthController::class , 'update_password']);

    ///////////////////////////////////////////// Cart functionality /////////////////////////////////////////
    Route::post('add-to-cart', [HomeController::class, "add_to_cart"]);
    Route::get('my-cart' , [HomeController::class , "my_cart"]);
    Route::post('delete-item-from-my-cart' , [HomeController::class , "delete_item_from_cart"]);
    Route::post('empty-cart' , [HomeController::class , "empty_cart"]) ;

    ///////////////////////////////////////////// Wishlist functionality /////////////////////////////////////////
    Route::post('add-remove-item-wishlist', [HomeController::class , "add_remove_item_wishlist"]);
    Route::get('my-wishlist', [HomeController::class, "my_wishlist"]);
    Route::post('empty-wishlist', [HomeController::class , "empty_wishlist"]);

    //////////////////////////////////////////// Queries functionality ///////////////////////////////////////////
    Route::post('send-query' , [HomeController::class , "send_query"]);


});


////////////////////////////////////////////////// User view Ajax ////////////////////////////////////////////////
Route::get('get-city/{country_id}' , [UserViewAjaxController::class , "get_city"]);
Route::get('get-region/{city_id}' , [UserViewAjaxController::class , "get_region"]);
Route::get('get-specific-product/{id}' , [UserViewAjaxController::class , "get_product"]);
Route::get('filter-by-price/{start_price}/{end_price}/{term}' , [UserViewAjaxController::class , "filter_by_price"]);
Route::get('add-to-compare-list/{product_id}' , [UserViewAjaxController::class , "add_to_wish_list"]);
Route::get('add-to-cart-list/{product_id}' , [UserViewAjaxController::class , "add_to_cart"]);
Route::get('empty-cart-after-counter-down' , [UserViewAjaxController::class , "empty_cart_after_counter_down"]);
