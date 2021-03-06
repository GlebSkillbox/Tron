<?php

namespace App\Models\User;

use App\Models\Message\Message;
use App\Traits\Favoritable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens,
        HasFactory,
        Notifiable,
        InteractsWithMedia,
        Favoritable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login',
        'email',
        'password',
        'balance',
        'about',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sent()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function received()
    {
        return $this->hasMany(Message::class, 'recipient_id');
    }

    public function sendMessageTo($recipient, $message)
    {
        return $this->sent()->create([
            'body'         => $message,
            'recipient_id' => $recipient,
            'read'         => false,
        ]);
    }

    public function allMessage()
    {
        return $this->received()->latest()->get();
    }
}
