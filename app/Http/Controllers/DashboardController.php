<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class DashboardController extends Controller
{
    public function index(){

        $posts = Auth::user()->posts()->latest()->paginate(6);
        return view('users.dashboard', ['posts' => $posts]);
        
    }

    public function userPosts(User $user){

        $userPost = $user->posts()->latest()->paginate(6);

        return view('users.posts', [
            'posts' => $userPost,
            'user' => $user,
            
        ]);
    }
}
