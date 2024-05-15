<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cuisine;
use App\Models\Resturaunt;
use App\Models\ResturauntAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $resturants=Resturaunt::get();
        return view('admin.resturaunts.index', compact('resturants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $cuisines= Cuisine::get();
        return view('admin.resturaunts.create', compact('cuisines'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $account=ResturauntAccount::create([
            'username'=>$request->username,
            'password'=>Hash::make($request->password),
        ]);
        if ($request->restuarant_image && $request->restuarant_cover) {
            $image_name = time() . '_logo.' . $request->restuarant_image->extension();
            $request->restuarant_image->move(public_path('uploads/resturants'), $image_name);
            $cover_name = time() . '_cover.' . $request->restuarant_cover->extension();
            $request->restuarant_cover->move(public_path('uploads/resturants'), $cover_name);
            Resturaunt::create([
                'name'=>$request->name,
                'owner_name'=>$request->owner_name,
                'address'=>$request->address,
                'image'=> $image_name,
                'cover'=>$cover_name,
                'mobile_no'=>$request->mobile_no,
                'email'=>$request->email,
                'cuisine_id'=>$request->cuisine_id,
                'account_id'=>$account->id,
                'latitude'=>$request->latitude,
                'longitude'=>$request->longitude,
            ]);
        } 
        $notification = array(
            'message' => 'Restuarant Added Successfully',
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
        $cuisines= Cuisine::get();
        $resturant=Resturaunt::find($id);
        return view('admin.resturaunts.edit', compact('cuisines','resturant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $resturant= Resturaunt::find($id);
        if ($request->restuarant_image && $request->restuarant_cover) {
            $image_name = time() . '_logo.' . $request->restuarant_image->extension();
            $request->restuarant_image->move(public_path('uploads/resturants'), $image_name);
            $cover_name = time() . '_cover.' . $request->restuarant_cover->extension();
            $request->restuarant_cover->move(public_path('uploads/resturants'), $cover_name);
            
            $resturant->update([
                'name'=>$request->name,
                'owner_name'=>$request->owner_name,
                'address'=>$request->address,
                'image'=> $image_name,
                'cover'=>$cover_name,
                'mobile_no'=>$request->mobile_no,
                'email'=>$request->email,
                'cuisine_id'=>$request->cuisine_id,
                'latitude'=>$request->latitude,
                'longitude'=>$request->longitude,
            ]);
        }else{
            $resturant->update([
                'name'=>$request->name,
                'owner_name'=>$request->owner_name,
                'address'=>$request->address,
                'mobile_no'=>$request->mobile_no,
                'email'=>$request->email,
                'cuisine_id'=>$request->cuisine_id,
                'latitude'=>$request->latitude,
                'longitude'=>$request->longitude,
            ]);
        }
        $notification = array(
            'message' => 'Restuarant Updated Successfully',
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
        Resturaunt::find($id)->delete();
        
        return response(['success'=>true], 200);
    }
}
