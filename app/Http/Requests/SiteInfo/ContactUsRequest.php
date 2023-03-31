<?php

namespace App\Http\Requests\SiteInfo;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
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
            "facebook" => "required",
            "linkedIn" => "required",
            "instegram" => "required",
            "address" => "required",
            "email" => "required|email",
            "phone1" => "required|numeric",
            "phone2" => "required|numeric",
        ];
    }
}