<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Locker;

class LockerController extends Controller
{
    public static function index()
    {
        $lockers = Locker::where('status','=','available')
            ->get();
        return $lockers;
    }

    //public static function 
}
