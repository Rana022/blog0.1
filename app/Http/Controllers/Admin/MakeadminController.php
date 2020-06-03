<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class MakeadminController extends Controller
{
    public function index(){
        $admins = User::where('role_id', 1)->get();
        $authors = User::where('role_id', 2)->get();
        return view('admin.authors.index', compact('authors', 'admins'));
    }

    public function promotion($username){
        $author = User::find($username);
        $author->role_id = 1;
        $author->save();
        toastr::success('successfully promoted to admin', 'success');
        return redirect()->back();
    }

    public function destroy($username){
        $author = User::find($username);
        $author->delete();
        toastr::success('successfully Deleted', 'success');
        return redirect()->back();
    }

    
    public function demotion($username){
        $admin = User::find($username);
        $admin->role_id = 2;
        $admin->save();
        toastr::success('successfully demoted to author', 'success');
        return redirect()->back();
    }

    public function admDestroy($username){
         $admin = User::find($username);
        $admin->delete();
        toastr::success('successfully Deleted', 'success');
        return redirect()->back();
    }

    
}
