<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $admins = Admin::get();
        return view('admin.admins.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Admin::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile_no'=>$request->mobile_no,
            'password'=>Hash::make($request->password),
        ]);
        $notification = array(
            'message' => 'Admin Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $admin = Admin::find($id);
        
        return view('admin.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $admin = Admin::find($id);
        $admin->update($request->all());
        $notification = array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Admin::find($id)->delete();
        
        return response(['success'=>true], 200);
    }

    public function status(string $id, Request $request)
    {
        //
        // $admin=Admin::find($id);
        // $admin->status= $request->status;
        // $admin->update();
        return response(['success'=>true, $request->all()], 200);
    }
}
