<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Addon;
use App\Models\Resturaunt;
use Illuminate\Http\Request;

class AddonsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $addons= Addon::get();
        return view('admin.addons.index', compact('addons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $restuarants= Resturaunt::get();
        return view('admin.addons.create', compact('restuarants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Addon::create($request->all());
        $notification = array(
            'message' => 'Addon Added Successfully',
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
        $addon=Addon::find($id);
        $restuarants= Resturaunt::get();
        return view('admin.addons.edit', compact('addon','restuarants'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        Addon::find($id)->update($request->all());
        $notification = array(
            'message' => 'Addon Updated Successfully',
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
        Addon::find($id)->delete();
        return response(['success'=>true], 200);
    }
}
