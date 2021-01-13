<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function index()
    {
        if (Auth::user()->admin) {
            $posts = Post::paginate(5);
        } else {
            $posts = Post::where('approved', 1)->paginate(5);
        }
        $title = 'All Posts';
        return view('post/index', compact('posts', 'title'));
    }

    function my_posts()
    {
        $posts = Post::where('user_id', Auth::user()->id)->paginate(5);
        $title = 'My Posts';
        return view('post/index', compact('posts', 'title'));
    }

    public function create()
    {
        $tags = PostTag::all();
        return view('post/create', compact('tags'));
    }

    public function save(Request $request)
    {
        $post = new Post($request->all());
        $post->user_id = Auth::id();
        $post->save();
        $post->post_tags()->attach($request->tags);
        return redirect()->action([PostController::class, 'index']);
    }

    public function approved(Post $post)
    {
        if ($post->approved == 1) {
            $post->approved = 0;
        } else {
            $post->approved = 1;
        }
        $post->save();
//        if ($post->approved){
//            Mail::raw("Post approved #". $post->name . " :)", function ($message) use ($post) {
//                $message -> to($post->user()->email)
//                    ->subject("Your post is approved #" . $post->id . "  #" . $post->title . " :)");
//            });
//        }
        response("ok", 200);
    }
}
