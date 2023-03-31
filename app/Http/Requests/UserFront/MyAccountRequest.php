<?php

namespace App\Http\Requests\UserFront;

use Illuminate\Foundation\Http\FormRequest;

class MyAccountRequest extends FormRequest
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
            "title_en" => "required" ,
            "title_ar" => "required"  ,
            "link_en" => "required"  ,
            "link_ar" => "required"
        ];
    }

    function messages()
    {
        return [
            "title_en.required" => "title in english is required" ,
            "title_ar.required" => "title in arabic is required" ,
            "link_en.required" => "link in english is required" ,
            "link_ar.required" => "link in arabic is required"
        ];
    }
}
