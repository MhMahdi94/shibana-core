<?php

namespace App\Http\Controllers\API\Customer;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use App\Models\WalletTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    //

    public function create_wallet(Request $request){
      //  return $request->all();
        try {
            //code...
            Wallet::create([
                'user_id'=>Auth::id(),
                'account_no'=>now()->format('Ym').Auth::id() ,
                'mobile_no'=> Auth::user()->mobile_no,
                'status'=>0,
            ]);
            return response([
                'success'=>0,
                'message'=>'Success',
            ],200);
        } catch (\Throwable $th) {
            //throw $th;
            return response([
                'success'=>1,
                'message'=>$th,
            ],200);
        }
    }

    public function get_wallet(Request $request){
        try {
            //code...
            $wallet=Wallet::where('user_id', Auth::id())->first();
            return response([
                'success'=>0,
                'message'=>'Success',
                'wallet'=>$wallet,
            ],200);
        } catch (\Throwable $th) {
            //throw $th;
            return response([
                'success'=>1,
                'message'=>$th,
            ]);
        }
    }

    public function top_wallet(Request $request){
        
        try {
            //code...
            $wallet=Wallet::where('user_id', Auth::id())->first();
            
            $wallet->balance=$wallet->balance + $request->amount;
            $wallet->save();
            WalletTransaction::create([
                'user_id'=>Auth::id(),
                'amount'=>$request->amount,
                'operation_id'=>1,
            ]);
            return response([
                'success'=>0,
                'message'=>'Success Topup',
                
            ],200);
        } catch (\Throwable $th) {
            //throw $th;
            return response([
                'success'=>1,
                'message'=>$th,
            ]);
        }
    }
}
