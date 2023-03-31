<?php

use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\MainFunctionalityController;
use App\Http\Middleware\CheckLogin;
use App\Http\Middleware\ReturnHome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});

Route::get('search', [MainFunctionalityController::class, 'search']);
Route::get('compare', [MainFunctionalityController::class, 'compare']);
Route::get('delete-item-compare/{id}', [MainFunctionalityController::class, 'delete_item_compare']);

Route::get('cart', [MainFunctionalityController::class, 'cart']);
Route::get('delete-item-cart/{id}', [MainFunctionalityController::class, 'delete_item_cart']);

Route::get('checkout-step1' , [CheckoutController::class , 'index']);

Route::middleware([ReturnHome::class])->group(function () {
    Route::get('/', [HomeController::class, "index"]);
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/sign-in', [AuthController::class, 'sign_in']);


    Route::get('/sign-up', [AuthController::class, 'sign_up']);
    Route::post('/register', [AuthController::class, 'register']);
});


Route::middleware([CheckLogin::class])->group(function () {
    // auth user
    Route::get('/user', [AuthController::class, "auth_home"]);
    Route::get('profile', [AuthController::class, "profile"]);
    Route::post('update-profile', [AuthController::class, "update_profile"]);
    Route::post('update-shipping-address', [AuthController::class, "update_shipping_address"]);


    Route::get('/logout', [AuthController::class, "logout"]);
});
