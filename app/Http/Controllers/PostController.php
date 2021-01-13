<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::paginate(5);
        return view('post/index', compact('posts'));
    }

    public function create()
    {
        $tags = PostTag::all();
        return view('post/create_post', compact('tags'));
    }
    public function save(Request $request)
    {
        $post = new Post($request->all());
        $post->user_id = Auth::id();
        $post->save();
        $post->post_tags()->attach($request->tags);
        return redirect()->action([PostController::class, 'index']);
    }
}
