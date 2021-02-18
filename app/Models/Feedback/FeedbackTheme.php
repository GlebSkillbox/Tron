<?php

namespace App\Models\Feedback;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackTheme extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
}
