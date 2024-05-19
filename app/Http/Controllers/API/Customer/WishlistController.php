<?php

namespace App\Http\Controllers\API\Customer;

use App\Http\Controllers\Controller;
use App\Models\MealsWishlist;
use App\Models\ResturantWishlist;
use App\Models\Resturaunt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    //
    public function add_meal_wishlist(Request $request){
        $item= MealsWishlist::where([['user_id',Auth::id()],['meal_id',$request->meal_id],])->first();
        if($item){
            
            try {
                $item->delete();
                return response([
                    'success'=>0,
                    'message'=>'Removed Successfully',
                ]);
            } catch (\Throwable $th) {
                //throw $th;
                return response([
                    'success'=>1,
                    'message'=>'Error',
                    'error'=>$th
                ]);
            }
        }else{
            try {
                MealsWishlist::create([
                   'user_id'=> Auth::id(),
                   'meal_id'=> $request->meal_id,
                ]);
                return response([
                    'success'=>0,
                    'message'=>'Addded Successfully',
                ]);
            } catch (\Throwable $th) {
                //throw $th;
                return response([
                    'success'=>1,
                    'message'=>'Error',
                    'error'=>$th
                ]);
            }
           
        }
    }

    public function add_resturant_wishlist(Request $request){
        $item= ResturantWishlist::where([['user_id',Auth::id()],['resturant_id',$request->resturant_id],])->first();
        if($item){
            
            try {
                $item->delete();
                return response([
                    'success'=>0,
                    'message'=>'Removed Successfully',
                ]);
            } catch (\Throwable $th) {
                //throw $th;
                return response([
                    'success'=>1,
                    'message'=>'Error',
                    'error'=>$th
                ]);
            }
        }else{
            try {
                ResturantWishlist::create([
                   'user_id'=> Auth::id(),
                   'resturant_id'=> $request->resturant_id,
                ]);
                return response([
                    'success'=>0,
                    'message'=>'Addded Successfully',
                ]);
            } catch (\Throwable $th) {
                //throw $th;
                return response([
                    'success'=>1,
                    'message'=>'Error',
                    'error'=>$th
                ]);
            }
           
        }
    }

    public function get_resturant_wishlist(){
        $resturants= ResturantWishlist::where('user_id',Auth::id())->with('resturant')->get();
        // foreach ($resturants as $resturant => $value) {
        //     # code...
        //     $rest=Resturaunt::where('id',$value->resturant_id)->first();
        //     $value->resturant=$rest;
        // }
        return response([
            'success'=>0,
            'message'=>'Addded Successfully',
            'wishlist'=>$resturants,
        ]);
    }

    public function get_meals_wishlist(){
        $meals= MealsWishlist::where('user_id',Auth::id())->with('meal')->get();
        // foreach ($resturants as $resturant => $value) {
        //     # code...
        //     $rest=Resturaunt::where('id',$value->resturant_id)->first();
        //     $value->resturant=$rest;
        // }
        return response([
            'success'=>0,
            'message'=>'Addded Successfully',
            'wishlist'=>$meals,
        ]);
    }
}
