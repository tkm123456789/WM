<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Locker extends Model
{
    use HasFactory;
    protected $fillable = [
        'locker_size',
        'location',
        'locker_num',
        'status'
    ];
}
