<?php

namespace App\Http\Requests\SiteInfo;

use Illuminate\Foundation\Http\FormRequest;

class TermsAndConditionsRequest extends FormRequest
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
            "term_and_condition_ar" => "required" ,
            "term_and_condition_en" => "required"
        ];
    }
}