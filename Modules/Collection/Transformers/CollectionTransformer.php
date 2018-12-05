<?php

namespace Modules\Collection\Transformers;

use League\Fractal\TransformerAbstract;
use Modules\Collection\Entities\Collection;

class CollectionTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Collection $collection)
    {
        return [
            'id' => (int) $collection->id,
            'name' => $collection->name,
        ];
    }
}
