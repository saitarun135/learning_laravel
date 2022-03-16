<?php

namespace App\Http\Controllers;

use App\Http\Requests\userRequest;
use App\UserSection;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;

class UserController extends Controller
{
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function userRegister(userRequest $request){
        $this->repository->create($request->all());                          
        return response()->json('created_succesfully');
    }
}
