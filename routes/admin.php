<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ContactMessagesController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DynamicPageController;
use App\Http\Controllers\Admin\FAQCategoryController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductReviewController;
use App\Http\Controllers\Admin\PromoCodeController;
use App\Http\Controllers\Admin\RegionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ShippingController;
use App\Http\Controllers\Admin\TaxController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\TermsAndConditionsController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\ContactMessageReplyController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\UserFrontController;
use App\Models\AboutUs;
use App\Models\ContactMessage;
use App\Models\ContactMessageReply;
use App\Models\ProductCategory;
use App\Models\TermsAndConditions;
use Illuminate\Support\Facades\Route;
use PhpOffice\PhpSpreadsheet\Settings;




Route::prefix('acp')->name('admin.')->group(function () {


    Route::get('/phpinfo', function () {
        phpinfo();
    });


    // start admin routes
    Route::controller(AuthController::class)->group(
        function () {
            Route::get('login', 'loginPage',)->name('loginPage');
            Route::post('login', 'login')->name('login');
            Route::delete('logout', 'logout')->name('logout');
        }
    );


    // start dashboard routes
    Route::middleware(['auth:admin', 'role:super-admin|admin'])->group(
        function () {

            Route::get(
                '/',
                function () {

                    return redirect()->route('admin.dashboard');
                }
            );

            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');


            // admin

            Route::controller(AdminController::class)->prefix('admins')->name('admins.')->group(
                function () {


                    Route::get('', 'index')->name('index');
                    Route::get('/export', 'export')->name('export');
                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/{id}/edit', 'edit')->name('edit');
                    Route::put('/{id}/update', 'update')->name('update');
                    Route::put('/{id}/restore', 'restore')->name('restore');
                    Route::delete('/{id}/destroy', 'destroy')->name('destroy');
                }
            );
            // admin

            // user

            Route::controller(UserController::class)->prefix('users')->name('users.')->group(
                function () {


                    Route::get('', 'index')->name('index');
                    Route::get('/search', 'search')->name('search');
                    Route::get('/export', 'export')->name('export');
                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/{id}/edit', 'edit')->name('edit');
                    Route::put('/{id}/update', 'update')->name('update');
                    Route::put('/{id}/restore', 'restore')->name('restore');
                    Route::delete('/{id}/destroy', 'destroy')->name('destroy');
                }
            );
            // user


            // // user front page

            Route::controller(UserFrontController::class)->prefix('user-front-settings')->name('user-front-settings.')->group(
                function () {
                    // top navbar routes
                    Route::get('top-navbar', 'index_top_bar')->name('index_top_bar');
                    Route::post('top-navbar/{id}/update', 'edit_top_bar')->name('edit_top_bar');

                    // navbar routes
                    Route::get('navbar', 'index_navbar')->name('index_navbar');
                    Route::post('navbar/{id}/update', 'edit_bar')->name('edit_bar');

                    // main slider
                    Route::get('main-sliders', 'main_slider')->name('main_slider');
                    Route::post('edit-main-slider/{id}/update', 'edit_main_slider')->name('edit_main_slider');

                    // first advs
                    Route::get('first-advs' , 'first_advs_index' )->name("first_advs_index");
                    Route::post('edit-first-advs/{id}/update', 'edit_first_advs')->name('edit_first_advs');

                    // second advs
                    Route::get('second-advs' , 'second_advs_index' )->name("second_advs_index");
                    Route::post('edit-second-advs/{id}/update', 'edit_second_advs')->name('edit_second_advs');

                    // our features
                    Route::get('our-features' , 'our_features')->name('our_features');
                    Route::post('edit-our-features/{id}/update', 'edit_our_feature')->name('edit_our_feature');

                    // main section footer settings
                    Route::get('main-section-footer' , 'main_section_footer_footer')->name('main_section_footer_footer');
                    Route::post('edit-main-section-footer/{id}/update', 'edit_main_section_footer_footer')->name('edit_main_section_footer_footer');

                    // my account footer section
                    Route::get('my-account-footer' , 'my_account_footer')->name('my_account_footer') ;
                    Route::post('edit-my-account-footer/{id}/update', 'edit_my_account_footer')->name('edit_my_account_footer');

                    // why we choose footer section
                    Route::get('why-we-choose-footer' , 'why_we_choose_footer')->name('why_we_choose_footer') ;
                    Route::post('edit-why-we-choose-footer/{id}/update', 'edit_why_we_choose_footer')->name('edit_why_we_choose_footer');

                    // store information
                    Route::get('store-info-footer' , 'store_info_footer')->name('store_info_footer') ;
                    Route::post('edit-store-info-footer/{id}/update', 'edit_store_info_footer')->name('edit_store_info_footer');

                    // top adv of product
                    Route::get('top-adv-product-details' , 'top_adv_product_details')->name("top_adv_product_details") ;
                    Route::post('edit-top-adv-product-details/{id}/update', 'edit_top_adv_product_details')->name('edit_top_adv_product_details');

                    // under adv of product
                    Route::get('under-adv-product-details' , 'under_adv_product_details')->name("under_adv_product_details") ;
                    Route::post('edit-under-adv-product-details/{id}/update', 'edit_under_adv_product_details')->name('edit_under_adv_product_details');

                }
            );
            // // user front page




























            // counties

            Route::controller(CountryController::class)->prefix('countries')->name('countries.')->group(
                function () {


                    Route::get('', 'index')->name('index');
                    Route::get('/export', 'export')->name('export');
                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/{id}/edit', 'edit')->name('edit');
                    Route::put('/{id}/update', 'update')->name('update');
                    Route::put('/{id}/restore', 'restore')->name('restore');
                    Route::delete('/{id}/destroy', 'destroy')->name('destroy');
                }
            );
            // counties


            // cities

            Route::controller(CityController::class)->prefix('cities')->name('cities.')->group(
                function () {


                    Route::get('', 'index')->name('index');
                    Route::get('cityByCountryId', 'cityByCountryId')->name('cityByCountryId');
                    Route::get('/export', 'export')->name('export');
                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/{id}/edit', 'edit')->name('edit');
                    Route::put('/{id}/update', 'update')->name('update');
                    Route::put('/{id}/restore', 'restore')->name('restore');
                    Route::delete('/{id}/destroy', 'destroy')->name('destroy');
                }
            );
            // cities


            // regions

            Route::controller(RegionController::class)->prefix('regions')->name('regions.')->group(
                function () {


                    Route::get('', 'index')->name('index');
                    Route::get('/export', 'export')->name('export');
                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/{id}/edit', 'edit')->name('edit');
                    Route::put('/{id}/update', 'update')->name('update');
                    Route::put('/{id}/restore', 'restore')->name('restore');
                    Route::delete('/{id}/destroy', 'destroy')->name('destroy');
                }
            );
            // regions


            // taxes

            Route::controller(TaxController::class)->prefix('taxes')->name('taxes.')->group(
                function () {


                    Route::get('', 'index')->name('index');
                    Route::get('/export', 'export')->name('export');
                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/{id}/edit', 'edit')->name('edit');
                    Route::put('/{id}/update', 'update')->name('update');
                    Route::put('/{id}/restore', 'restore')->name('restore');
                    Route::delete('/{id}/destroy', 'destroy')->name('destroy');
                }
            );
            // taxes



            // shippings

            Route::controller(ShippingController::class)->prefix('shippings')->name('shippings.')->group(
                function () {


                    Route::get('', 'index')->name('index');
                    Route::get('/export', 'export')->name('export');
                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/{id}/edit', 'edit')->name('edit');
                    Route::put('/{id}/update', 'update')->name('update');
                    Route::put('/{id}/restore', 'restore')->name('restore');
                    Route::delete('/{id}/destroy', 'destroy')->name('destroy');
                }
            );
            // shippings


            // promo-codes

            Route::controller(PromoCodeController::class)->prefix('promo-codes')->name('promo-codes.')->group(
                function () {


                    Route::get('', 'index')->name('index');
                    Route::get('/export', 'export')->name('export');
                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/{id}/edit', 'edit')->name('edit');
                    Route::put('/{id}/update', 'update')->name('update');
                    Route::put('/{id}/restore', 'restore')->name('restore');
                    Route::delete('/{id}/destroy', 'destroy')->name('destroy');
                }
            );
            // promo-codes


            // products-categories

            Route::controller(ProductCategoryController::class)->prefix('products-categories')->name('products-categories.')->group(
                function () {


                    Route::get('', 'index')->name('index');
                    Route::get('/export', 'export')->name('export');
                    Route::get('/subCategoryByParentId', 'subCategoryByParentId')->name('subCategoryByParentId');
                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/{id}/edit', 'edit')->name('edit');
                    Route::put('/{id}/update', 'update')->name('update');
                    Route::put('/{id}/restore', 'restore')->name('restore');
                    Route::delete('/{id}/destroy', 'destroy')->name('destroy');
                }
            );
            // products-categories

            Route::controller(TermsAndConditionsController::class)->prefix('terms-and-conditions')->name('terms-and-conditions.')->group(
                function () {

                    Route::get('' , 'index')->name('index');
                    Route::get('/{id}/edit', 'edit')->name('edit');
                    Route::put('/{id}/update', 'update')->name('update');

                }
            );


            Route::controller(ContactUsController::class)->prefix('contact-us')->name('contact-us.')->group(
                function () {

                    Route::get('', 'index')->name('index');
                    Route::get('/{id}/edit', 'edit')->name('edit');
                    Route::put('/{id}/update', 'update')->name('update');
                }
            );


            Route::controller(ContactMessageController::class)->prefix('contact-messages')->name('contact-messages.')->group(
                function () {

                    Route::get('', 'index')->name('index');
                    Route::get('/{id}/destroy', 'destroy')->name('destroy');
                }
            );

            Route::controller(ContactMessageReplyController::class)->prefix('contact-message-reply')->name('contact-message-reply.')->group(
                function () {

                    Route::post('/{id}/reply', 'send_reply')->name('send_reply');
                }
            );

            Route::controller(AboutUsController::class)->prefix('about-us')->name('about-us.')->group(
                function () {

                    Route::get('', 'index')->name('index');
                    Route::get('/{id}/edit', 'edit')->name('edit');
                    Route::put('/{id}/update', 'update')->name('update');
                }
            );

            // products

            Route::controller(ProductController::class)->prefix('products')->name('products.')->group(
                function () {


                    Route::get('', 'index')->name('index');
                    Route::get('/export', 'export')->name('export');
                    Route::get('/subCategoryByParentId', 'subCategoryByParentId')->name('subCategoryByParentId');
                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/{id}/edit', 'edit')->name('edit');
                    Route::put('/{id}/update', 'update')->name('update');
                    Route::put('/{id}/restore', 'restore')->name('restore');
                    Route::put('/{id}/activation', 'activation')->name('activation');
                    Route::put('/{id}/inactivation', 'inactivation')->name('inactivation');

                    Route::put('/{id}/updatePrice', 'updatePrice')->name('updatePrice');
                    Route::put('/{id}/updateStock', 'updateStock')->name('updateStock');

                    Route::delete('/{id}/destroy', 'destroy')->name('destroy');
                }
            );
            // products
            // products-reviews

            Route::controller(ProductReviewController::class)->prefix('products-reviews')->name('products-reviews.')->group(
                function () {


                    Route::get('', 'index')->name('index');
                    Route::get('/export', 'export')->name('export');
                    Route::put('/{id}/approved', 'approved')->name('approved');
                    Route::delete('/{id}/destroy', 'destroy')->name('destroy');
                }
            );
            // products-reviews



            // orders

            Route::controller(OrderController::class)->prefix('orders')->name('orders.')->group(
                function () {


                    Route::get('', 'index')->name('index');
                    Route::get('newOrders', 'newOrders')->name('newOrders');
                    Route::get('inprogressOrders', 'inprogressOrders')->name('inprogressOrders');
                    Route::get('deliveredOrders', 'deliveredOrders')->name('deliveredOrders');
                    Route::get('cancelledOrders', 'cancelledOrders')->name('cancelledOrders');

                    //
                    Route::post('/{id}/AddExtraFees', 'AddExtraFees')->name('AddExtraFees');
                    Route::post('/{id}/AddSpecialDiscount', 'AddSpecialDiscount')->name('AddSpecialDiscount');

                    Route::delete('/{orderId}/deleteExtraFees/{id}', 'deleteExtraFees')->name('deleteExtraFees');
                    Route::delete('/{orderId}/deleteSpecialDiscount/{id}', 'deleteSpecialDiscount')->name('deleteSpecialDiscount');
                    //
                    Route::get('{type}/export', 'export')->name('export');
                    Route::put('/{id}/inprogressAction', 'inprogressAction')->name('inprogressAction');
                    Route::put('/{id}/deliveredAction', 'deliveredAction')->name('deliveredAction');
                    Route::put('/{id}/updateComment', 'updateComment')->name('updateComment');
                    Route::put('/{id}/updateCustomAddressFromAdmin', 'updateCustomAddressFromAdmin')->name('updateCustomAddressFromAdmin');

                    Route::delete('/{id}/cancelledAction', 'cancelledAction')->name('cancelledAction');

                    Route::get('/{id}/show', 'show')->name('show');
                }
            );
            // orders






            // settings

            Route::controller(SettingController::class)->prefix('settings')->name('settings.')->group(
                function () {
                    Route::get('', 'index')->name('index');
                    Route::put('/update', 'update')->name('update');
                }
            );
            // settings










        }
    );
    // start dashboard routes





});
