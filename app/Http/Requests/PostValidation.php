<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostValidation extends FormRequest
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
            'name'=>'required',
            'dateofcreation'=>'required',
            'dateofredact'=>'required',
            'description'=>'required',
            'smalldesc'=>'required',
            'tags'=>'required',
            'photo'=>'required',
            'user_id'=>'required'
        ];
    }
}
