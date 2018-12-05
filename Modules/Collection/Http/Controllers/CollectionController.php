<?php

namespace Modules\Collection\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Auth\Entities\User;
use Modules\Collection\Entities\Collection;
use Modules\Collection\Http\Requests\StoreCollection;
use Modules\Collection\Http\Requests\UpdateCollection;
use Modules\Collection\Transformers\CollectionTransformer;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $collections = Collection::all();

        return fractal($collections, new CollectionTransformer())->respond();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCollection $request
     * @return JsonResponse
     */
    public function store(StoreCollection $request)
    {

        $collection = new Collection($request->validated());

        $collection->creator_id = User::find(1)->id;
        $collection->owner_id = $collection->creator_id;

        $collection->save();

        return fractal($collection, new CollectionTransformer())->respond();
    }

    /**
     * Show the specified resource.
     *
     * @param [int] $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $collection = Collection::find($id);

        return fractal($collection, new CollectionTransformer())->respond();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCollection $request
     * @param [int] $id
     * @return JsonResponse
     */
    public function update(UpdateCollection $request, $id)
    {
        $collection = Collection::find($id);

        $collection->update($request->validated());

        return fractal($collection, new CollectionTransformer())->respond();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param [int] $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $collection = Collection::find($id);

        $collectionCopy = $collection;

        $collection->delete();

        return fractal($collectionCopy, new CollectionTransformer())->respond();
    }
}
