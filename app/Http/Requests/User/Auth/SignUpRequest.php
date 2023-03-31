<?php

namespace App\Http\Requests\User\Auth;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            "phone" => 'required|min:10|numeric|unique:users',
            "birth_date" => "required|date_format:Y-m-d",
            "address" => "required",
            "gender" => "required",
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            "country_id" => 'required',
            "city_id" => 'required',
            "region_id" => "required"
        ];
    }

    public function messages()
    {
        return[
            "country_id.required" => "please choose country" ,
            "city_id.required" => "please choose city" ,
            "region_id.required" => "please choose region"
        ];
    }
}
