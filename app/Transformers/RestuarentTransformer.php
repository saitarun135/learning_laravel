<?php

namespace App\Transformers;

use App\Entities\Restuarent;
use League\Fractal\TransformerAbstract;

class RestuarentTransformer extends TransformerAbstract
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
    public function transform(Restuarent $entity)
    {
        return [
            'id' => $entity->id,
            'name' => $entity->type,
            'ratings' => $entity->rating
        ];
    }
}
