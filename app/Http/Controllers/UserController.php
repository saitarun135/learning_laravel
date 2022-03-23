<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\userRequest;
use App\Repositories\UserRepositoryInterface;
use App\Transformers\UserTransformer;
use Exception;

class UserController extends Controller
{
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
    *   user can register with basic details  
    */

    public function userRegister(userRequest $request){
        $data = $this->getEncryptValue($request->all(),'password');
        $user = $this->repository->create($data);                   
        return response()->json(fractal($user,new UserTransformer()));
    }

    /**
     *  user can login
     * https://stackoverflow.com/questions/49900523/call-to-a-member-function-createtoken-on-null
     * https://laravel.com/docs/5.0/hashing
    */
    
    public function userLogin(LoginRequest $request){
        $user = $this->repository->verification('email',$request->email)->first();
        $password = $this->getEncryptValue($request->all(),'password');
        $password_chk = ($password != $user->password);
        if(!$password_chk){
            throw new Exception('password is incorrect'.$request->password);
        }
        if($password_chk && !is_null($user)){
            $Accesstoken = $user->createToken('Access Token')->accessToken;
            return Response(['User_name' => $user->first_name .' '.$user->last_name, 'Access Token' => $Accesstoken]);
        }
        else{
            throw new Exception('un-authenticated');
        }
    }

    public function getUsers(){
        $data = $this->repository->show();
        return response()->json(fractal($data, new UserTransformer()));
    }
}
