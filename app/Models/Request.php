<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Request extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'requests';

    protected $fillable = [
        'name',
        'email',
        'status',
        'message',
        'comment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function routeNotificationForMail($notification)
    {
        // Вернуть только адрес электронной почты ...
        return $this->user->email;

    }
}
