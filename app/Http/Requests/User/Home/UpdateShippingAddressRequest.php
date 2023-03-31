<?php

namespace App\Http\Requests\User\Home;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShippingAddressRequest extends FormRequest
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
            "flat" => "required",
            "address" => "required",
            "country_id" => "required",
            "city_id" => "required",
            "zip_code" => "required"
        ];
    }

    public function messages()
    {
        return [
            "flat.required" => "flat is required" ,
            "address.required" => "address is required" ,
            "country_id.required" => "country is required" ,
            "city_id.required" => "city is required" ,
            "zip_code.required" => "zip code is required"
        ];
    }
}
