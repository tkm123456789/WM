<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;
class Message extends Model
{
    protected $fillable = [
        'sender_id',
        'recipient_id',
        'text'
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }
}
