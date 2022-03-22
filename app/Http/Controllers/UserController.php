<?php

namespace App\Http\Controllers;

use App\Http\Requests\userRequest;
use App\Repositories\UserRepositoryInterface;
use App\Transformers\UserTransformer;

class UserController extends Controller
{
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function userRegister(userRequest $request){
        $data = $this->getHashValue($request->all(),'password');
        $user = $this->repository->create($data);
        $user->createToken('auth')->accessToken;                    
        return response()->json(fractal($user,new UserTransformer()));
    }

    public function getUsers(){
        $data = $this->repository->show();
        return response()->json(fractal($data, new UserTransformer()));
    }
}
