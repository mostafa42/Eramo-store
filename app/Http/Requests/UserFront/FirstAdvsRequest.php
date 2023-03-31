<?php

namespace App\Http\Requests\UserFront;

use Illuminate\Foundation\Http\FormRequest;

class FirstAdvsRequest extends FormRequest
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
            "main_image" => "sometimes|mimes:jpeg,png,jpg",
            "small_text" => "required",
            "big_text" => "required",
            "link" => "required"
        ];
    }

    public function messages()
    {
        return [
            "main_image.mimes" => "invalid image" ,
            "small_text.required" => "samll text title is required" ,
            "big_text.required" => "big text is required" ,
            "link.required" => "link is required"
        ];
    }
}
