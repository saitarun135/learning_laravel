<?php

namespace App\Http\Controllers;

use App\Repositories\RestuarentRepository;
use App\Transformers\RestuarentTransformer;
use Illuminate\Http\Request;

class RestaurentsController extends Controller
{
    protected $repository;

    public function __construct(RestuarentRepository $repository){
        $this->repository = $repository;
    }

    public function getAllRestaurents(){
        $restaurents = $this->repository->display();
        return response()->json(fractal($restaurents,new RestuarentTransformer()));
    }
}
