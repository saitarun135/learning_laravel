<?php

namespace App\Transformers;

use App\User;

class UserTransformer extends CustomTransformer
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
            'id' => $this->getHashedKey($entity->id),
            'full_name' => $entity->first_name.' '.$entity->last_name,
            'email' => $entity->email,
            'phone' => $entity->phone_number
        ];
    }
}
