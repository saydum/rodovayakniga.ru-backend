<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(8);
        return view('web.blog.all', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('web.blog.show', compact('post'));
    }
}
