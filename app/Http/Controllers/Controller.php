<?php

namespace App\Http\Controllers;

use Hashids\Hashids;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getEncryptValue(Array $data,$key){
        $encrypt = encrypt($data[$key]);
        unset($data[$key]);
        $data[$key] = $encrypt;
        return $data;
    }

    public function getDecryptValue($value){
        return decrypt($value);
    }

    public function getAccountId($request)
    {
        $token=$request->bearerToken();
        $tokenParts = explode(".", $token); 
        $tokenPayload = base64_decode($tokenParts[1]);
        $jwtPayload = json_decode($tokenPayload);
        return $jwtPayload->sub;
    }

    public function getDeHashedKey($data)
    {
        $obj = new Hashids();
        return $obj->decode($data);
    }
}
