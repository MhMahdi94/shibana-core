<?php

namespace App\Http\Controllers\API\Customer;

use App\Http\Controllers\Controller;
use App\Models\CartModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function get_cart(){
        $cart= CartModel::where('user_id',Auth::id())
        ->with('user')
        ->with('resturant')
        ->with('meal')
        ->with('variation')
        ->with('option')
        ->get();
        return response([
            'success'=>0,
            'message'=>'Fetched Successfully',
            'cart'=>$cart,
        ]);
    }

    public function add_to_cart(Request $request){
        $cart= CartModel::create([
            'user_id'=>Auth::id(),
            'meal_id'=>$request->meal_id,
            'resturant_id'=>$request->resturant_id,
            'variation_id'=>$request->variation_id,
            'option_id'=>$request->option_id,
            'quantity'=>$request->quantity,
            'price'=>$request->price,
        ]);
        return response([
            'success'=>0,
            'message'=>'Added Successfully',
            //'cart'=>$cart,
        ]);
    }
}
