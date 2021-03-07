<?php

namespace App\Http\Controllers\Api\Favorite;

use App\Http\Controllers\Controller;
use App\Models\User\User;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function addFavoriteUser(User $user)
    {
        $validated = request()->validate([
            'user_id' => 'required|integer',
        ]);

        $user->addFavorites($validated['user_id']);

        return response()->json($user);
    }

    public function removeFavoriteUser(User $user)
    {
        $validated = request()->validate([
            'user_id' => 'required|integer',
        ]);

        $user->removeFavorites($validated['user_id']);

        return response()->noContent();
    }
}
