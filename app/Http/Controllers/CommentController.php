<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post, )
    {
        $request->validate([
            'body' => 'required|string',
        ]);

        if (!Auth::check()) { 
            return redirect()->back()->with('error', 'You must be logged in to comment.'); 
        } 

        $userId = Auth::id(); 
        
        if (!$userId) { 
            return redirect()->back()->with('error', 'Unable to retrieve user ID.'); 
        }
        

        $post = Post::find($post->id);
        
        if (!$post) {
            return redirect()->back()->with('error', 'Post not found.');
        }

        $comment = new Comment;
        $comment->post_id = $post->id;
        $comment->user_id = Auth::id();
        $comment->body = $request->input('body');
        $comment->save();
        return redirect()->route('posts.show', $post->id)->with('success', 'Comment added successfully');
    }

}
