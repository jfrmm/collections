<?php

namespace Modules\Collection\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Auth\Entities\User;
use Modules\Collection\Entities\Collectible;
use Modules\Collection\Http\Requests\StoreCollectible;
use Modules\Collection\Http\Requests\UpdateCollectible;
use Modules\Collection\Transformers\CollectibleTransformer;

class CollectibleController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCollectible $request
     * @return JsonResponse
     */
    public function store(StoreCollectible $request)
    {
        $collectible = new Collectible($request->validated());

        $collectible->creator_id = User::find(1)->id;
        $collectible->owner_id = $collectible->creator_id;

        $collectible->save();

        return fractal($collectible, new CollectibleTransformer())->respond();
    }

    /**
     * Show the specified resource.
     *
     * @param [int] $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $collectible = Collectible::find($id);

        if ($collectible) {
            return fractal($collectible, new CollectibleTransformer())->respond();
        }

        return response()->json(null, 204);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCollectible $request
     * @param [int] $id
     * @return JsonResponse
     */
    public function update(UpdateCollectible $request, $id)
    {
        $collectible = Collectible::find($id);

        if (!$collectible) {
            return response()->json(null, 204);
        }

        $collectible->update($request->validated());

        return fractal($collectible, new CollectibleTransformer())->respond();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param [int] $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $collectible = Collectible::find($id);

        if (!$collectible) {
            return response()->json(null, 204);
        }

        $collectibleCopy = $collectible;

        $collectible->delete();

        return fractal($collectibleCopy, new CollectibleTransformer())->respond();
    }
}
