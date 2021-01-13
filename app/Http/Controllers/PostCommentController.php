<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCommentRequest;
use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostCommentController extends Controller
{
    public function save(PostCommentRequest $request, Post $post)
    {
        $post_comment = new PostComment($request->all());
        $post_comment->user_id = Auth::id();
        $post_comment->post_id = $post->id;
        $post_comment->save();
        return redirect()->route('post', $post->id);
    }
}
