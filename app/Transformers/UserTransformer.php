<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];
    
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $entity)
    {   
        return [
            'id' => $entity->id,
            'full_name' => $entity->first_name.' '.$entity->last_name,
            'email' => $entity->email,
            'phone' => $entity->phone_number
        ];
    }
}
