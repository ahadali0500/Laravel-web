<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\accountapproved;

class AdminCustomer extends Controller
{
    public function customer()
    {
        $data['register'] = DB::table('register')
         ->orderBy('id', 'DESC')
        ->get();
        return view('admin.customer',$data);
    }
     public function userapproval_process(Request $request)
     {
        if ($request->status=="approve") {
            $status="Approve";
        }else{
            $status="Disapprove";
        }
       DB::table('register')
        ->where(['register_id'=>$request->register_id])
       ->update(['register_status'=>$status]);
       if ($request->status=="approve") {

          $user=DB::table('register')
          ->where(['register_id'=>$request->register_id])
          ->get();
          $mailData=[
            'name'=>$user[0]->register_firstname
          ];
       Mail::to($user[0]->register_email)->send(new accountapproved($mailData));
       }
      
         return response()->json(['status'=>'success','msg'=>'Account ' . $status . ' successfully']);
     }
    
    public function messages()
    {
         $data['contact']=DB::table('contact')
         ->get();
    return view('admin.message',$data);
    }
}