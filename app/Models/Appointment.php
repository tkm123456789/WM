<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'locker_size',
        'location',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
