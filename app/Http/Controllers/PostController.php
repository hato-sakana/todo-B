<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    function show($id)
    {
        $post = Post::find($id);

        return view('posts.show', ['post'=>$post]);
    }


    public function create()
    {
        return view('posts.create');
    }
    
    
}
