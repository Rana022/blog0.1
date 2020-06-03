<?php

namespace App\Http\Controllers\Admin;

use App\Basic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class BasicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $basic = Basic::first();
        return view('admin.basic.index', compact('basic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $basic = Basic::find($id);
        return view('admin.basic.edit', compact('basic'));
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
        $basic = Basic::find($id);
        $basic->blog_name = $request->blog_name;
        $basic->welcome_speech = $request->welcome_speech;
        $basic->address = $request->address;
        $basic->contact = $request->contact;
        $basic->email = $request->email;
        $basic->facebook = $request->facebook;
        $basic->linkedin = $request->linkedin;
        $basic->twitter = $request->twitter;
        $basic->slogan = $request->slogan;
        $basic->save();
        toastr::success('Your info Successfully updated', 'success');
        return redirect()->route('admin.basic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
