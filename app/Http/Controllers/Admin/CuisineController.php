<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cuisine;
use Illuminate\Http\Request;

class CuisineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cuisines = Cuisine::get();
        return view('admin.cuisines.index', compact('cuisines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.cuisines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // return $request->all();
        if ($request->image) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $fileName);
            Cuisine::create([
                'name' => $request->name,
                'image' => $fileName
            ]);
        } else {
            Cuisine::create([
                'name' => $request->name,
            ]);
        }
        $notification = array(
            'message' => 'Successfully Done',
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
        $cuisine = Cuisine::find($id);
        return view('admin.cuisines.edit', compact('cuisine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        if ($request->image) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $fileName);
            $cuisine = Cuisine::find($id);
            $cuisine->name = $request->name;
            $cuisine->image = $fileName;
            $cuisine->save();
        } else {
            $cuisine = Cuisine::find($id);
            $cuisine->name = $request->name;
           
            $cuisine->save();
        }
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
        Cuisine::find($id)->delete();
        
        return response(['success'=>true], 200);
    }
}
