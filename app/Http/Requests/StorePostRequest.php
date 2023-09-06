<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StorePostRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => "required|string|min:3|max:255",
            'mail' => "required|email|min:3|max:255",
            'phone' => "required|string|min:7|max:255",
            'subject' => "required|string|min:3|max:255",
            'contentData' => "required|string|min:3|max:255",
            'recaptcha' => ["required", new \App\Rules\Recaptcha]
        ];
    }


    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json(['message' => 'Lütfen tüm alanları doldurunuz.'], 400)
        );
    }
}
