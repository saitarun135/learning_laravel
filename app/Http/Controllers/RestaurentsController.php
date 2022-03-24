<?php

namespace App\Http\Controllers;

use App\Criteria\AccountIDCriteriaCriteria;
use App\Http\Requests\RestaurentRequest;
use App\Repositories\RestaurentRepository;
use App\Transformers\RestuarentTransformer;

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
        $this->repository->pushCriteria(new AccountIDCriteriaCriteria);
        $restaurents = $this->repository->all();
        return response()->json(fractal($restaurents,new RestuarentTransformer()));
    }
}
