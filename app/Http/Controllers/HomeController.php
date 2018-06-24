<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Show home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = User::select('id','name')->withCount('posts')->get();
        $posts  = Post::with('user')->latest()->simplePaginate(10);
        //dd($posts);
        return view('welcome',['users' => $users ,'posts'=> $posts ]);
    }
    /**
     * Show the user POSTS page.
     *
     * @return \Illuminate\Http\Response
     */
    public function author($id)
    {
        $user = User::with(['posts' => function ($q) {
                    $q->orderBy('created_at', 'desc');
                    }])->findOrFail($id);
        
        //$posts  = User::find($id)->posts()->orderBy('created_at')->get();
        //dd($user->posts);
        return view('home',['user' => $user ]);
    }
    
}
