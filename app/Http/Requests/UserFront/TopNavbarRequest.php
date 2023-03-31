<?php

namespace App\Http\Requests\UserFront;

use Illuminate\Foundation\Http\FormRequest;

class TopNavbarRequest extends FormRequest
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
            "welcome_to" => "required",
            "deliver_in" => "required",
            "code" => "required"
        ];
    }
    function messages()
    {
        return [
            "welcome_to.required" => "welcome to is required",
            "deliver_in.required" => "deliver in to is required",
            "code.required" => "code to is required",
        ] ;
    }
}
