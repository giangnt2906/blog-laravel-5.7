<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Http\Controllers\PostsController;
use App\Post;

class CommentController extends Controller
{
    //
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'comment_body' => 'required',
        ]);

        // $input = $request->all();
        // $input['user_id'] = auth()->user()->id;

        // Comment::create($input);

        $comment = new Comment;
        $comment->body = $request->get('comment_body');
        $comment->user()->associate($request->user());
        $comment->post_id = $request->get('post_id');
        $post = Post::find($request->get('post_id'));
        $post->comments()->save($comment);

        return back();
    }

    // replyStore function
    public function replyStore(Request $request)
    {
        $request->validate([
            'comment_body' => 'required',
        ]);
        
        $reply = new Comment();
        $reply->body = $request->get('comment_body');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $reply->post_id = $request->get('post_id');
        $post = Post::find($request->get('post_id'));

        $post->comments()->save($reply);

        return back();
    }
}
