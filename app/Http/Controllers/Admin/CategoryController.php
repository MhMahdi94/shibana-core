<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories= Category::get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if ($request->image) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/categories'), $fileName);
            Category::create([
                'name' => $request->name,
                'image' => $fileName
            ]);
        } else {
            Category::create([
                'name' => $request->name,
            ]);
        }
        $notification = array(
            'message' => 'Category Added Successfully',
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
        $category= Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $category=Category::find($id);
        if ($request->image) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/categories'), $fileName);
            $category->update([
                'name' => $request->name,
                'image' => $fileName
            ]);
        } else {
            $category->update([
                'name' => $request->name,
            ]);
        }
        $notification = array(
            'message' => 'Category Updated Successfully',
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
        Category::find($id)->delete();
        
        return response(['success'=>true], 200);
    }
}
