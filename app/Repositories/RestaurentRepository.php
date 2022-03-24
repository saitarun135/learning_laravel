<?php

namespace App\Repositories;

use App\Criteria\AccountIDCriteriaCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\Restaurent;
use App\Restaurent as AppRestaurent;
use App\Validators\RestaurentValidator;

/**
 * Class RestaurentRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class RestaurentRepository extends BaseRepository implements RestaurentRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return AppRestaurent::class;
    }

    public $fieldSearchable = 
                            ['name',
                            'type'=>'like'
                            ];

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function create(array $attributes)
    {
       return $this->model()::create($attributes);
    }
    
}
