<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;

class LikeController extends Controller
{
    public function likePost(Request $request, $postId) {
        $post = Post::findOrFail($postId);
    
        // Check if the user already liked the post
        $like = Like::where('user_id', auth()->id())
                    ->where('post_id', $postId)
                    ->first();
    
        if ($like) {
            // Unlike the post
            $like->delete();
        } else {
            // Like the post
            $post->likes()->create(['user_id' => auth()->id()]);
        }
    
        // Return the updated like count
        return response()->json(['newLikeCount' => $post->likes()->count()]);
    }
    
}
