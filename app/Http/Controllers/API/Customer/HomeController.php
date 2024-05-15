<?php

namespace App\Http\Controllers\API\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Resturaunt;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function get_categories()
    {
        //
        try {
            //code...
            $categories=Category::all()->random(5);
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

    public function get_resturants(){
         //
         try {
            //code...
            $restuarants=Resturaunt::all()->random(5);
            return response([
                'success'=>0,
                'message'=>'Success',
                'restuarants'=>$restuarants
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
