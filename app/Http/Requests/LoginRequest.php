<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => ['required',Rule::exists('user','email')->where('email',$this->email)],
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'email.exists' => 'Email is not found'
        ];
    }
}
