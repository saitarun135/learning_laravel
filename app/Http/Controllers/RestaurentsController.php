<?php

namespace App\Http\Controllers;

use App\Criteria\AccountIDCriteriaCriteria;
use App\Criteria\FindCriteria;
use App\Criteria\WhereCriteriaCriteria;
use App\Http\Requests\RestaurentRequest;
use App\Repositories\RestaurentRepository;
use App\Transformers\RestuarentTransformer;
use Illuminate\Support\Facades\DB;

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

    public function findRestaurentById($id){
        $this->repository->pushCriteria(new WhereCriteriaCriteria('id',$this->getDeHashedKey($id)));
        $restaurent = $this->repository->paginate();
        return response()->json(fractal($restaurent,new RestuarentTransformer));
    }
}
