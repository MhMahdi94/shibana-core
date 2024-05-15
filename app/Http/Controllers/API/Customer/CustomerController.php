<?php

namespace App\Http\Controllers\API\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    //
    public function test()
    {
        return 'hello';
    }

    public function customer_login(Request $request)
    {
        $loginUserData = $request->validate([
            'mobile_no'=>'required|string',
            'password'=>'required'
        ]);
        $customer = Customer::where('mobile_no',$loginUserData['mobile_no'])->first();
        if(!$customer || !Hash::check($loginUserData['password'],$customer->password)){
            return response()->json([
                'message' => 'Invalid Credentials',
                'success'=>1,
            ]);
        }
        $token = $customer->createToken($customer->name.'-AuthToken')->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'success'=>0,
            'message'=>'Success Authentication'
        ]);
    }

    public function customer_register(Request $request)
    {
        try {
            //code...
            $registerUserData = $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|email|unique:customers',
                'mobile_no' => 'required|string|unique:customers',
                'password' => 'required'
            ]);
            $customer = Customer::create([
                'name' => $registerUserData['name'],
                'email' => $registerUserData['email'],
                'mobile_no' => $registerUserData['mobile_no'],
                'password' => Hash::make($registerUserData['password']),
            ]);
            return response()->json([
                'message' => 'Customer Created ',
                'success' => 0,
                'customer' => $customer,
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'message' => 'Error: '. $th,
                'success' => 1,
            ]);
        }
        
    }
}
