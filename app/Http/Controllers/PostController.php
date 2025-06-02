<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public static function index()
    {
        $posts = Post::all();
        return $posts;
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('post', ['post' => $post]);
    }
}
