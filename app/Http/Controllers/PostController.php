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

    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = Auth::id();
        $img = $request->file('image_at');
        $post->save();
        return redirect()->route('post.index');
    }
    
}
