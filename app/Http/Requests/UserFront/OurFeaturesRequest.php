<?php

namespace App\Http\Requests\UserFront;

use Illuminate\Foundation\Http\FormRequest;

class OurFeaturesRequest extends FormRequest
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
            "icon" => "sometimes|mimes:jpeg,png,jpg" ,
            "title" => "required" ,
            "sub_title" => "required"
        ];
    }

    function messages()
    {
        return [
            "icon.mimes" => "invalid image" ,
            "title.required" => "title is required" ,
            "sub_title" => "sub title is required"
        ];
    }
}
