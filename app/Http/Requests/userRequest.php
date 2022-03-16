<?php

namespace App\Http\Requests;

use App\Rules\CustomRule;
use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
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
            'first_name' => 'string|required|max:25',
            'phone_number' => 'required|integer|unique:UserSection'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'first name is required',
            'first_name.string' => 'it must be a string',
            'phone_number.integer' => 'it must be a number' ,
            'phone_number.unique' => 'already taken'
        ];
    }
}
