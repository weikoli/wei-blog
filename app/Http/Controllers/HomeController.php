<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $this->middleware('auth');
        // $this->middleware('guest',['except' => 'getLogout']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        // create a variable and store all the blog posts in it from the database
        $posts = Post::orderBy('id','desc')->paginate(5);
        // return a view and pass in the above variable
        return view('posts/index')->withPosts($posts);
    }
}
