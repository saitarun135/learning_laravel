<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class WhereCriteriaCriteria.
 *
 * @package namespace App\Criteria;
 */
class WhereCriteriaCriteria implements CriteriaInterface
{
    protected $field;
    protected $value;

    public function __construct($field , $value)
    {
        $this->field = $field;
        $this->value = $value;
    }
    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->where($this->field , $this->value);
    }
}
