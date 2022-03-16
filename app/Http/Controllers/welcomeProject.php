<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class welcomeProject extends Controller
{
    public function welcome(){
        return  phpinfo();
    }
}
