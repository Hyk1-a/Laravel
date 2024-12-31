<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Storage;
use App\Policies;

class PostController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index','show']),
        ];
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(6);

        return view('posts.home', ['posts'=> $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

         //Validate
        $fields = $request->validate([
            'title'=>['required','max:255'],
            'body'=>['required'],
            'image'=>['nullable', 'file', 'max:5000', 'mimes:png,jpg,jpeg,webp'],
        

        ]); 
        //Store image
        $path = null;
        if ($request->hasFile('image')){
            $path = Storage::disk('public')->put('posts_image', $request->image);

        }
        
        //Create
        Auth::user()->posts()->create([
            'title' => $request->title,
            'body'=> $request->body,
            'image'=>$path ,
        ]);

        //redirect
        return redirect()->back()->with('success','Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view ('posts.show', ['post'=> $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        
        //Authorize
        Gate::authorize('modify', $post);
        return view ('posts.edit',['post'=> $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
    
        //Authorize
        Gate::authorize('modify', $post);

        dd(Auth::user()->id, $post->user_id);

         //Validate
        $request->validate([
            'title'=>['required','max:255'],
            'body'=>['required'],
            'image'=>['nullable', 'file', 'max:5000', 'mimes:png,jpg,jpeg,webp'],

        ]); 
        
        //Store image
        $path = $post->image ?? null;
        if ($request->hasFile('image')){
            if($post->image){
                Storage::disk('public')->delete($post->image); 
            }

            $path = Storage::disk('public')->put('posts_image', $request->image);

        }
        //Update
        $post->update([
        'title' => $request->title,
        'body'=> $request->body,
        'image'=>$path ,

    ]);

        //redirect
        return redirect()->route('dashboard')->with('success','Post Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {   
    
        //Authorize
        Gate::authorize('modify', $post);

        if($post->image){
            Storage::disk('public')->delete($post->image); 

        }
        //Delete
        $post->delete();
        return back()->with('delete','Post deleted successfully');
    }
}
