<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function show_login_view()
    {
        return view('admin.auth.login');
    }
    public function login(Request $request)
    {
        $res=auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]);
        //  return $res;
          if($res){
             // toastr()->success('Your account has been restored.');
             $notification = array(
                'message' => 'Successfully Done',
                'alert-type' => 'success'
            );
            return  redirect('/admin/home');
           //  return 'auth s'  ;
             //return  redirect('/admin/home');
          }else{
              return "not done";
          }
    }
}