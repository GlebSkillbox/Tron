<?php

namespace App\Models\Feedback;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = ['owner_email', 'message', 'theme_id'];
}
