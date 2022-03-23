<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\userRequest;
use App\Repositories\UserRepository;
use App\Transformers\UserTransformer;
use Exception;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $repository;

    public function __construct(UserRepository $repository){
        $this->repository = $repository;
    }

    public function adminRegister(userRequest $request){
        $data = $this->getEncryptValue($request->all(),'password');
        $admin = $this->repository->create($data);
        return response()->json(fractal($admin,new UserTransformer));
    }

    public function adminLogin(LoginRequest $request){
        $admin = $this->repository->verification('email',$request->email)->first();
        if($this->getDecryptValue($admin->password) != $request->password){
            throw new Exception('Password is wrong,please enter correct password');
        }
        $Accesstoken = $admin->createToken('Access Token')->accessToken;
        return Response(['User_name' => $admin->first_name .' '.$admin->last_name,'type' =>'Admin', 'Access Token' => $Accesstoken]);
    }
}
