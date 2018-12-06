<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Auth\Entities\User;
use Modules\Auth\Transformers\UserTransformer;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $users = User::all();

        return fractal($users, new UserTransformer())->respond();
    }

    /**
     * Show the specified resource.
     *
     * @param [int] $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(null, 204);
        }

        return fractal($user, new UserTransformer())->respond();
    }
}
