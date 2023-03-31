<?php

namespace App\Http\Requests\UserFront;

use Illuminate\Foundation\Http\FormRequest;

class SecondAdvsRequest extends FormRequest
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
            "image" => "sometimes|mimes:jpeg,png,jpg",
            "link" => "required"
        ];
    }

    public function messages()
    {
        return [
            "image.mimes" => "invalid image" ,
            "link.required" => "link is required"
        ];
    }
}
