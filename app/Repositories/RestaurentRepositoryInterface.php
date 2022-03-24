<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface RestaurentRepository.
 *
 * @package namespace App\Repositories;
 */
interface RestaurentRepositoryInterface extends RepositoryInterface
{
    public function create(Array $attributes);
}
