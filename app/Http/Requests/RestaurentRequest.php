<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurentRequest extends FormRequest
{

    public function rules()
    {
        return[
            'name'=>'string|required',
            'type'=>'string|required'
        ];
    }

}