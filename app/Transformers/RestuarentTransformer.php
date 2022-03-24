<?php

namespace App\Transformers;

use App\Restaurent;
use League\Fractal\TransformerAbstract;

class RestuarentTransformer extends CustomTransformer
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
     * 
     */
    public function transform(Restaurent $entity)
    {
        return [
            'id' => $this->getHashedKey($entity->id),
            'name' => $entity->name,
            'type' => $entity->type,
            'ratings' => $entity->rating,
            'since_active' => $entity->created_at
        ];
    }
}
