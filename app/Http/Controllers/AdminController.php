<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = \App\Admin::all();
        return view('admin/index', compact('admins'));//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->action === 'back') {
            return redirect()->route('admin.index');
        } else {
            $admin = new \App\Admin;
            $admin->admin_code = $request->admin_code;
            $admin->name = $request->name;
            $admin->role = $request->role;
            $admin->password = Hash::make($request->password);
            $admin->save();
            return redirect()->route('admin.index');
        }//
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admins = \App\Admin::find($id);
        return view('admin.show', compact('admins'));//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admins = \App\Admin::find($id);//
        return view('admin.edit', compact('admins'));
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
        if($request->action === 'back') {
            return redirect()->route('admin.index');
        } else {
            $admin = \App\Admin::find($id);
            $admin->admin_code = $request->admin_code;
            $admin->name = $request->name;
            $admin->role = $request->role;
            $admin->password = Hash::make($request->password);
            $admin->save();
            return redirect()->route('admin.index');
        }//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admins = \App\Admin::find($id);
        $admins->delete();
        return redirect()->route('admin.index');//
    }
}
