<?php

namespace App\Http\Controllers;

use App\Post;

use App\Comment;

use App\User;

use Auth;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Post $post)
    {

        request()->validate([
            'comment' => 'min:2|max:255'
        ]);

        // dd(request());

        // $comment = new Comment;
        // $comment->body = request('comment');
        // $comment->post_id = $post->id;
        // $comment->save();

        // return redirect('/posts/' . request('post_id'));

        // Comment::create([
        // 	'body' => request('comment'),
        // 	'post_id' => $post->id
        // ]);

    	// Go to post model.
    	$post->addComment(request('comment'));

        return back();
    }
}
