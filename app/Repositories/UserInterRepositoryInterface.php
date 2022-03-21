<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;
use App\UserSection;
use App\Repositories\UserRepositoryEloquent;

/**
 * Interface UserRepository.
 *
 * @package namespace App\Repositories;
 */
interface UserRepositoryInterface extends RepositoryInterface
{

    public function create(Array $attributes);

    public function show();

    public function verification($data);
}
