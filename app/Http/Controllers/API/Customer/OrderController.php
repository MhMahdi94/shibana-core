<?php

namespace App\Http\Controllers\API\Customer;

use App\Http\Controllers\Controller;
use App\Models\CartModel;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //
    public function save_order(Request $request){
      //  return $request->all();
        try {
            //code...
            $order= Order::create([
                'user_id'=>Auth::id(),
                'address'=> $request->address, 
                'delivery_date'=> $request->delivery_date, 
                'delivery_time'=> $request->delivery_time, 
                'delivery_notes'=> $request->delivery_notes, 
                'price'=> $request->price, 
                'delivery'=> $request->delivery, 
                'vat'=> $request->vat, 
                'resturant_id'=> $request->resturant_id, 
                'total_price'=> $request->total_price, 
                // 'payment_status'=>0,
                //cart: [12]
            ]);
            foreach ($request->cart as $item) {
                try {
                    //code...
                    # code...
                    OrderDetails::create([
                       // 'id'=> $item->id, 
                        'quantity'=> $item['quantity'], 
                        'price'=> $item['price'], 
                        'meal_id'=> $item['meal_id'], 
                        'variation_id'=> $item['variation_id'], 
                        'option_id'=> $item['option_id'],
                        'order_id'=>$order->id,
                    ]);
                } catch (\Throwable $th) {
                    throw $th;
                }
                
            }
            CartModel::where('user_id',Auth::id())->delete();
            return response([
                'success'=>0,
                'message'=>'Placed Successfully',
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response([
                'success'=>0,
                'message'=>'Place Order Fail',
                'error'=>$th,
            ]);
        }
       
    }

    public function get_orders(){
        try {
            //code...
            $orders=Order::where('user_id', Auth::id())->where('order_status',1)->with(['resturant' => function ($query) {
                $query->select('id', 'name', 'image');
            }])->get();
            return response([
                'success'=>0,
                'message'=>'Success',
                'orders'=>$orders,
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response([
                'success'=>1,
                'message'=>$th,
               
            ]);
        }

    }

    public function get_orders_history(){
        try {
            //code...
            $orders=Order::where('user_id', Auth::id())->get();
            return response([
                'success'=>0,
                'message'=>'Success',
                'orders'=>$orders,
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response([
                'success'=>1,
                'message'=>$th,
               
            ]);
        }

    }
}
