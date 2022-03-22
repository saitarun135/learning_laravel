<?php

namespace App\Transformers;

use Hashids\Hashids as HashidsHashids;
use League\Fractal\TransformerAbstract;
use Vinkla\Hashids\Facades\Hashids;


class CustomTransformer extends TransformerAbstract
{

    public function getHashedKey($data){
        $obj = new HashidsHashids();
        return $obj->encode($data);
    }
}
