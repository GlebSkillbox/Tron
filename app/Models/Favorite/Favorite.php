<?php

namespace App\Models\Favorite;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $table = 'favorites';

    protected $guarded = [];

    public function favoritable()
    {
        return $this->morphTo();
    }
}
