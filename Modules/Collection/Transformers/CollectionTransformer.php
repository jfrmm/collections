<?php

namespace Modules\Collection\Transformers;

use League\Fractal\TransformerAbstract;
use Modules\Collection\Entities\Collection;

class CollectionTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'collectibles',
    ];

    /**
     * A Fractal transformer.
     *
     * @param Collection $collection
     * @return array
     */
    public function transform(Collection $collection)
    {
        return [
            'id' => (int) $collection->id,
            'name' => $collection->name,
        ];
    }

    /**
     * @param Collection $collection
     * @return \League\Fractal\Resource\Collection
     */
    public function includeCollectibles(Collection $collection)
    {
        $collectibles = $collection->collectibles()->get();

        return $this->collection($collectibles, new CollectibleTransformer);
    }
}
