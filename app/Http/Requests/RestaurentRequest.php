<?php

namespace App\Http\Requests;

use App\Restaurent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class RestaurentRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }   

    public function rules()
    {
        return[
            'name'=>'string|required',
            'type'=>'string|required'
        ];
    }

}