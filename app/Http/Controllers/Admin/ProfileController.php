<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::id())->first();
        return view('admin.profile.profile', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.profile.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'about' => 'required',
        ]);
        $user = User::find($id);
        $image = $request->file('image');
        $slug = str::slug($request->title);
        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $ext = $image->getClientOriginalExtension();
            $imageName = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $ext;
            if (!Storage::disk('public')->exists('user')) {
                Storage::disk('public')->makeDirectory('user');
            }
            if (Storage::disk('public')->exists('user/' . $user->image)) {
                Storage::disk('public')->delete('user/' . $user->image);
            }
            $imageSize = Image::make($image)->resize(100, 100)->stream();
            Storage::disk('public')->put('user/' . $imageName, $imageSize);
        } 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->about = $request->about;
        if($image){
        $user->image = $imageName;
        }else{
            $user->image = $user->image;
        }
        $user->save();

        toastr::success('Your Profile Successfully Updated', 'success');
        return redirect()->route('admin.profile');
    }
}
