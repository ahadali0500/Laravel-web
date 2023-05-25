<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminAuth extends Controller
{
     public function index()
     {
          if (session()->has('admin')) {
             return redirect('/admin/dashboard');
          }else{
               return view('admin/auth');
          }
    
     }
     public function AdminAuth_process(Request $request)
     { 
     if($request->email==""){
     return response()->json(['status'=>'emptyemail','msg'=>'Email Feild is Empty!']);
     }
     else if($request->password==""){
     return response()->json(['status'=>'emptypassword','msg'=>'Password Feild is Empty!']);
     }else{
     $data = DB::table('adminauth')
     ->where(['email'=>$request->email,'password'=>$request->password])
     ->get();
     if (isset($data[0])) {
     $request->session()->put('admin','true');
     return response()->json(['status'=>'success','msg'=>'Login Successfully Redirecting....']);
     }else{
     return response()->json(['status'=>'invalid','msg'=>'Invalid Credentials']);
     }

     }
     }
}