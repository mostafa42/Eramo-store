<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        if(request()->is('*acp/*')){

            // $user = User::find(502);

            // // return $user;

            // Auth::login($user);


            // return   Auth::guard('admin')->user();

            // \abort(403);
            Auth::setDefaultDriver('admin');



        }
    }
}
