<?php

namespace App\Traits;

use App\Models\Favorite\Favorite;

trait Favoritable
{
    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favoritable');
    }

    public function addFavorites($userId = null)
    {
        $favorite = new Favorite(['user_id' => isset($userId) ? $userId : auth()->id()]);

        $this->favorites()->save($favorite);
    }

    public function removeFavorites($userId = null)
    {
        $this->favorites()->where('user_id', isset($userId) ? $userId : auth()->id())->delete();
    }
}
