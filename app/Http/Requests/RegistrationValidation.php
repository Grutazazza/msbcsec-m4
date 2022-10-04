<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationValidation extends FormRequest
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
            'fullname'=>'required',
            'email'=>'required',
            'photo'=>'required|max:2024',
            'password'=>'required|min:6',
            'dateofbirth'=>'required',
            'confirmation_polity'=>'required'
        ];
    }
}
