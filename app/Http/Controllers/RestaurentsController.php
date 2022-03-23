<?php

namespace App\Http\Controllers;

use App\Entities\Restuarent;
use App\Http\Requests\RestaurentRequest;
use App\Repositories\RestaurentRepository;
use App\Repositories\RestuarentRepository;
use App\Restaurent;
use App\Transformers\RestuarentTransformer;
use Illuminate\Http\Request;

class RestaurentsController extends Controller
{
    protected $repository;

    public function __construct(RestaurentRepository $repository){
        $this->repository = $repository;
    }

    public function postRestaurent(Request $request){
        $this->repository->create($request->all());
        
    }

    public function getAllRestaurents(){
        $restaurents = $this->repository->display();
        return response()->json(fractal($restaurents,new RestuarentTransformer()));
    }
}
