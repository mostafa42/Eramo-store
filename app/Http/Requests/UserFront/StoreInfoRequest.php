<?php

namespace App\Http\Requests\UserFront;

use Illuminate\Foundation\Http\FormRequest;

class StoreInfoRequest extends FormRequest
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
            "location" => "required",
            "phone" => "required",
            "email" => "required",
            "fax" => "required"
        ];
    }

    function messages()
    {
        return [
            "location.required" => "Location is required",
            "phone.required" => "Phone to is required",
            "email.required" => "Email is required",
            "fax.required" => "Fax is required",
        ] ;
    }
}
