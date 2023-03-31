<?php

namespace App\Http\Requests\UserFront;

use Illuminate\Foundation\Http\FormRequest;

class NavbarRequest extends FormRequest
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
            "logo" => "sometimes|mimes:jpeg,png,jpg" ,
            "call_us" => "required" ,
        ];
    }

    function messages()
    {
        return [
            "logo.mimes" => "invalid image" ,
            "call_us.required" => "call us is required"
        ];
    }
}
