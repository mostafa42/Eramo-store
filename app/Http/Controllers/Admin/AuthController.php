<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');

    }



    public function loginPage(){
        return view('admin.auth.login');
    }


    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);



        // return $request->all();


        if (Auth::guard('admin')->attempt($credentials ,$request->remember)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }




        return back()->withErrors([
            'credentials' => 'The provided credentials do not match our records.',
        ]);
    }


    public function logout(Request $request){

        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');

    }
}
