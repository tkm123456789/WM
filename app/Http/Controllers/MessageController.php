<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function show($id)
    {
        $message = Message::findOrFail($id);
        return;
    }
}
