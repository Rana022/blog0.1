<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

class CommentController extends Controller
{
    public function store(Request $request){

        $comment = new Comment;
        $comment->body = $request->comment;
        $comment->user_id = Auth::id();
        $post = Post::find($request->post_id);
        $post->comments()->save($comment);
        toastr::success('Your comment Successfully Added', 'success');
        return redirect()->back();

    }

    public function replayStore(Request $request)
    {

        $replay = new Comment;
        $replay->body = $request->body;
        $replay->user_id = Auth::id();
        $replay->parent_id = $request->comment_id;
        $post = Post::find($request->post_id);
        $post->comments()->save($replay);
        toastr::success('Your Replay Successfully Added', 'success');
        return redirect()->back();
    }

}
