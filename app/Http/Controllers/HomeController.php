<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Jorenvh\Share\Share;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
         $posts = Post::active()->published()->inRandomOrder()->paginate(6);
        return view('welcome', compact('posts'));
    }
}
