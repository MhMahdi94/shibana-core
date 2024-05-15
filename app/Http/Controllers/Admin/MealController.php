<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Meal;
use App\Models\Resturaunt;
use App\Models\Variation;
use App\Models\VariationOption;
use Illuminate\Http\Request;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $meals = Meal::get();
        return view('admin.meals.index', compact('meals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $restuarants = Resturaunt::get();
        $categories = Category::get();
        return view('admin.meals.create', compact('restuarants', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $fileName = time() . '.' . $request->meal_image->extension();
        $request->meal_image->move(public_path('uploads/meals'), $fileName);
        $meal = Meal::create([
            'name' => $request->name,
            'resturant_id' => $request->restaurant_id,
            'category_id' => $request->category_id,

            'price' => $request->price,
            'image' => $fileName

        ]);
        // $i=0
        if ($request->variation_name) {
            for ($i = 0; $i < count($request->variation_name); $i++) {
                # code...
                $variation = Variation::create([
                    'name' => $request->variation_name[$i],
                    'meal_id' => $meal->id,
                    'resturant_id' => $request->restaurant_id,

                ]);

                for ($j = 0; $j < count($request->option_name[$i]); $j++) {
                    # code...
                    VariationOption::create(
                        [
                            'name' => $request->option_name[$i][$j],
                            'value' => $request->option_value[$i][$j],
                            'meal_id' => $meal->id,
                            'resturant_id' => $request->restaurant_id,
                            'variation_id' => $variation->id,

                        ]
                    );
                }
            }
        }
        $notification = array(
            'message' => 'Meal Added Successfully',
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
