<?php

namespace App\Http\Requests\User\Home;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            "name" => "required" ,
            "email" => "required|email" ,
            "phone" => "required|numeric|min:10"
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "name is required" ,
            "email.required" => "email is required" ,
            "email.email" => "invalid email" ,
            "phone.required" => "password is required" ,
            "phone.min" => "invalid phone"
        ];
    }
}
