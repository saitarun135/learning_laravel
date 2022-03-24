<?php

namespace App\Http\Controllers;

use App\Entities\Restuarent;
use App\Http\Requests\RestaurentRequest;
use App\Repositories\RestaurentRepository;
use App\Repositories\RestuarentRepository;
use App\Restaurent;
use App\Transformers\RestuarentTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurentsController extends Controller
{
    protected $repository;

    public function __construct(RestaurentRepository $repository){
        $this->repository = $repository;
    }

    public function postRestaurent(RestaurentRequest $request){
        $data = $request->all(); 
        $data['admin_id'] = $this->getAccountId($request);
        $rest = $this->repository->create($data);
        return response()->json(fractal($rest,new RestuarentTransformer));
        
    }

    public function getAllRestaurents(){
        $restaurents = $this->repository->display();
        return response()->json(fractal($restaurents,new RestuarentTransformer()));
    }
}
