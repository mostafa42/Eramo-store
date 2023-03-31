<?php

namespace App\Http\Requests\UserFront;

use Illuminate\Foundation\Http\FormRequest;

class MainSectionFooterRequest extends FormRequest
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
            "description" => "required" ,
            "google_play_link" => "required" ,
            "apple_store_link" => "required"
        ];
    }

    public function messages()
    {
        return [
            "logo.mimes" => "invalid image" ,
            "description.required" => "Description is required" ,
            "google_play_link.required" => "Google Store Link is required" ,
            "apple_store_link.required" => "Apple Store Link is required"
        ];
    }
}
