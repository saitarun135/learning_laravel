<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RestuarentRepository;
use App\Entities\Restuarent;
use App\Validators\RestuarentValidator;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class RestuarentRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class RestuarentRepositoryEloquent extends BaseRepository implements RestuarentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Restuarent::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
    public function display(){
        return $this->model::get();
    }

    public function create($data){
        return $this->model()::create($data);
    }
}
