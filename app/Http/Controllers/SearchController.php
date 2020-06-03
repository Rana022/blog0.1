<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){ 
        $search = $request->input('search');
        $search_posts = Post::where('title','LIKE',"%$search%")->published()->active()->paginate(5);
        $recent_post = Post::orderBy('id', 'desc')->take(3)->get();
        return view('search_view',compact('search_posts','recent_post'));
    }
}
