<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\userRequest;
use App\Repositories\UserRepositoryInterface;
use App\Transformers\UserTransformer;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
        //$this->middleware('auth.basic'); 
    }

    /**
     * user can register with basic details  
    */

    public function userRegister(userRequest $request){
        $data = $this->getHashValue($request->all(),'password');
        $user = $this->repository->create($data);
        // $user->createToken('auth')->accessToken;                    
        return response()->json(fractal($user,new UserTransformer()));
    }

    /**
     *  user can login
     * https://stackoverflow.com/questions/49900523/call-to-a-member-function-createtoken-on-null
     * https://laravel.com/docs/5.0/hashing
    */
    
    public function userLogin(LoginRequest $request){
        $password = Hash::make($request->password);
        $user = $this->repository->verification('email',$request->email)->first();
        $password_chk = Hash::check($request->password,$password);
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
