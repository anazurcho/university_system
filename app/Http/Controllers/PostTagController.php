<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostTagRequest;
use App\Models\PostTag;
use Illuminate\Http\Request;

class PostTagController extends Controller
{
    //
    public function index()
    {
        $post_tags = PostTag::paginate(10);
        return view('post_tag/index', compact('post_tags'));
    }

    public function create()
    {
        return view('tag/create');
    }

    public function save(PostTagRequest  $request)
    {
        $post_tag = new PostTag($request->all());
        $post_tag->save();
        return redirect()->action([PostTagController::class, 'index']);
    }
    public function delete(PostTag $post_tag)
    {
        $post_tag->delete();
        return redirect()->action([PostTagController::class, 'index']);
    }
    public function post_tag(PostTag $post_tag)
    {
        $posts = $post_tag->posts()->paginate(5);
        return view("post_tag/post_tag", compact('post_tag', 'posts'));
    }
}
