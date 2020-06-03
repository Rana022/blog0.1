<?php

namespace App\Http\Controllers\Author;

use App\Tag;
use App\Post;
use App\User;
use App\Category;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AuthorToAdminNotification;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user = Auth::user();
        $post = $user->posts;
        return view('author.post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('author.post.create', compact('tags', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'image' => 'required',
            'categories' => 'required',
            'tags' => 'required',
        ]);
        $image = $request->file('image');
        $slug = str::slug($request->title);
        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $ext = $image->getClientOriginalExtension();
            $imageName = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $ext;
            if (!Storage::disk('public')->exists('post')) {
                Storage::disk('public')->makeDirectory('post');
            }
            $imageSize = Image::make($image)->resize(1666, 1060)->stream();
            Storage::disk('public')->put('post/' . $imageName, $imageSize);
        } else {
            $imageName = 'default.png';
        }
        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = str::title($request->title);
        $post->slug = $slug;
        $post->image = $imageName;
        $post->body = $request->body;
        if (isset($request->status)) {
            $post->status = true;
        } else {
            $post->status = false;
        }
        $post->is_approved = false;
        $post->save();
        $post->tags()->attach($request->tags);
        $post->categories()->attach($request->categories);
        $users = User::where('id',1)->get();
        Notification::send($users, new AuthorToAdminNotification($post));
        toastr::success('Your Post Successfully Added', 'success');
        return redirect()->route('author.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $post = Post::find($id);
        return view('author.post.edit', compact('categories', 'tags', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'categories' => 'required',
            'tags' => 'required',
        ]);
         $post = Post::find($id);
        $image = $request->file('image');
        $slug = str::slug($request->title);
        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $ext = $image->getClientOriginalExtension();
            $imageName = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $ext;
            if (!Storage::disk('public')->exists('post')) {
                Storage::disk('public')->makeDirectory('post');
            }
            if (Storage::disk('public')->exists('post/' . $post->image)) {
                Storage::disk('public')->delete('post/' . $post->image);
            }
            $imageSize = Image::make($image)->resize(1666, 1060)->stream();
            Storage::disk('public')->put('post/' . $imageName, $imageSize);
        } else {
            $imageName = 'default.png';
        }
        $post->user_id = Auth::id();
        $post->title = str::title($request->title);
        $post->slug = $slug;
        if (isset($request->image)) {
            $post->image =  $imageName;
        }else{
            $post->image = $post->image;
        }
        $post->body = $request->body;
        if (isset($request->status)) {
            $post->status = true;
        } else {
            $post->status = false;
        }
        $post->is_approved = false;
        $post->save();
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        toastr::success('Your Post Successfully Updated', 'success');
        return redirect()->route('author.post.index');
    }
    public function statusActive($id)
    {
        $post = Post::find($id);
        if ($post->status == false) {
            $post->status = true;
            $post->save();
            toastr::success('Your Post Successfully Approved', 'success');
        } else {
            toastr::info('Your Post Already Approved', 'info');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        toastr::success('Your Post Successfully Deleted', 'success');
        return redirect()->back();
    }
}
