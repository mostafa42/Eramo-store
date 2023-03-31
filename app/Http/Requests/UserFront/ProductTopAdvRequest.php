<?php

namespace App\Http\Requests\UserFront;

use Illuminate\Foundation\Http\FormRequest;

class ProductTopAdvRequest extends FormRequest
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
            "link" ,
            "title" => "required",
            "description" => "required"
        ];
    }

    public function messages()
    {
        return [
            "main_image.mimes" => "invalid image" ,
            "link.required" => "link is required" ,
            "title.required" => "Title is required" ,
            "description.required" => "Description is required"
        ];
    }
}
