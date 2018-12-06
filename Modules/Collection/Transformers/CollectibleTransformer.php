<?php

namespace Modules\Collection\Transformers;

use League\Fractal\TransformerAbstract;
use Modules\Collection\Entities\Collectible;

class CollectibleTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Collectible $collectible)
    {
        return [
            'id' => (int) $collectible->id,
            'name' => $collectible->name,
            'collection_id' => $collectible->collection_id,
        ];
    }
}
