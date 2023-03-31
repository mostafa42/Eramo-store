<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ForgetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Country;
use App\Models\City;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Helper\UploadHelper;
use App\Models\ContactMessage;
use App\Models\ContactUs;

class AuthController extends Controller
{
    public function signin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "phone" => 'required|min:10|numeric',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 404);
        }

        if (Auth::attempt(['phone' => $request->phone, 'password' => $request->password])) {
            $authUser = Auth::user();
            $success['token'] =  $authUser->createToken('MyAuthApp')->plainTextToken;
            $success['name'] =  $authUser->name;

            return response()->json(["msg" => $success], 200);
        } else {
            return response()->json(["errors" => "invalid credentials"], 404);
        }
    }

    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            "phone" => 'required|min:10|numeric|unique:users',
            "image" => "sometimes|image",
            "birth_date" => "required|date_format:Y-m-d",
            "gender" => "required",
            "sign_from" => "required",
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            "country_id" => 'required',
            "city_id" => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 404);
        }

        $input = $request->all();

        // check country
        $country = Country::find($request->country_id);

        if (!$country) {
            return response()->json(["errors" => "invalid country"], 404);
        }

        // check city
        $city = City::find($request->city_id);

        if (!$city || $city->country_id != $country->id) {
            return response()->json(["errors" => "invalid city"], 404);
        }

        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyAuthApp')->plainTextToken;
        $success['name'] =  $user->name;

        return response()->json(["msg" => $success], 200);
    }

    public function my_account()
    {
        return response(Auth::user());
    }

    // forget password cycle
    public function give_me_email(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 404);
        }
        // check if email is exist

        $exist = User::where("email", $request->email)->first();
        if (!$exist) {
            return response()->json(["errors" => "wrong email !"], 404);
        }

        // sending email process


        // generate random code
        $code = random_int(1000, 9999);

        $details  = [
            'title' => 'Mail from E-Ramo Store',
            'code' => $code
        ];

        \Mail::to($exist->email)->send(new ForgetPassword($details));

        $exist->update([
            "code" => $code
        ]);

        return response()->json(["msg" => "please check your email ! "]);
    }

    public function validate_code(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => "required|email",
            'code' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 404);
        }

        // validate it
        $user = User::where("email", $request->email)->first();
        if (!$user) {
            return response()->json(["errors" => " wrong email !"], 404);
        } else {
            if ($user->code != $request->code) {
                return response()->json(["errors" => "invalid code !"], 404);
            }
            return response()->json(["msg" => "code is valid !"], 200);
        }
    }

    public function change_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'code' => 'required|numeric',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 404);
        }

        // validate code
        $user = User::where("email", $request->email)->first();
        if (!$user) {
            return response()->json(["errors" => " wrong email !"], 404);
        } else {
            if ($user->code != $request->code) {
                return response()->json(["errors" => "invalid code !"], 404);
            }

            // reset new password
            $user->update([
                "password" => Hash::make($request->password)
            ]);

            return response()->json(["msg" => "password is updated successfully !"]);
        }
    }

    public function update_information(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore(Auth::user()->id)],
            "phone" => ['required', ' numeric', 'min:10', Rule::unique('users')->ignore(Auth::user()->id)],
            "birth_date" => "required|date_format:Y-m-d",
            "gender" => "required",
            "country_id" => 'required',
            "city_id" => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 404);
        }

        $user = Auth::user()->update($request->all()) ;

        return response()->json(["msg" => "information updated successfully !"]);
    }

    public function update_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'new_password' => 'required' ,
            'confirm_password' => 'required|same:new_password'
        ]);

        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 404);
        }

        $user = Auth::user();

        if( ! Hash::check($request->password , $user->password) ){
            return response()->json(["errors" => "wrong password !"] , 404) ;
        }

        $user->update([
            "password" => Hash::make($request->new_password)
        ]);

        //
        return response()->json(["msg" => "password updated successfully !"]) ;
    }
}