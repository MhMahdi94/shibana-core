<?php

namespace App\Http\Controllers\API\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Meal;
use App\Models\Variation;
use App\Models\VariationOption;
use Illuminate\Http\Request;

class ResturantController extends Controller
{
    //
    public function get_categories()
    {
        //
        try {
            //code...
            $categories=Category::all();
            return response([
                'success'=>0,
                'message'=>'Success',
                'categories'=>$categories
            ],200);
        } catch (\Throwable $th) {
            //throw $th;
            return response([
                'success'=>1,
                'message'=>'Error',
            ],200);
        }
       
    }

    public function get_meals(int $resturant_id, int $category_id)
    {
        //
        try {
            //code...
            $meals=Meal::where([['resturant_id','=',$resturant_id], ['category_id','=',$category_id]])->get();
            foreach ($meals as $meal=>$value) {
                # code...
                $variation=Variation::where('meal_id',$value->id)->get();
                $value->variations=$variation;
            }
            foreach ($meals as $meal=>$value) {
                # code...
               
                $options=VariationOption::where('meal_id',$value->id)->get();
                $value->options=$options;
            }
            return response([
                'success'=>0,
                'message'=>'Success',
                'meals'=>$meals
            ],200);
        } catch (\Throwable $th) {
            //throw $th;
            return response([
                'success'=>1,
                'message'=>'Error',
            ],200);
        }
       
    }
}
