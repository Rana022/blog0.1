<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function post($slug){

        $post = Post::where('slug', $slug)->first();
        $recent_post = Post::orderBy('id', 'desc')->published()->active()->take(3)->get();
        $postKey = 'blog_' . $post->id;
        if (!Session::has($postKey)) {
            $post->increment('view_count');
            Session::put($postKey, 1);
        }
       return view('post_details', compact('post', 'recent_post'));

    }
    public function postByCategory($slug){
        $category = Category::where('slug', $slug)->first();
        $category_post = $category->posts()->published()->active()->paginate(5);
        return view('category_post', compact('category_post', 'category'));
    }
    public function postByTag($slug)
    {
        $tag = Tag::where('slug', $slug)->first();
        $tag_post = $tag->posts()->published()->active()->paginate(5);
        return view('tag_post', compact('tag_post', 'tag'));
    }
}
