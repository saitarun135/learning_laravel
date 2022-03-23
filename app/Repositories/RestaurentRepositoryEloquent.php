<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RestaurentRepository;
use App\Entities\Restaurent;
use App\Validators\RestaurentValidator;

/**
 * Class RestaurentRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class RestaurentRepositoryEloquent extends BaseRepository implements RestaurentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Restaurent::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
