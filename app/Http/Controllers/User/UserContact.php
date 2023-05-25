<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserContact extends Controller
{
    public function index()
    {
    return view('user/contact');
    }
    public function AddContact_process(Request $request)
    {
        $insert = DB::table('contact')->insert([
            
        'first_name'=>$request->first_name,
        'phone'=>$request->phone,
        'email_address'=>$request->email_address,
        'contact_subject'=>$request->contact_subject,
        'message'=>$request->message,
        'contact_id'=>rand(1111,0000),

    ]);
    if ($insert) {
       
        return response()->json(['status'=>'success','msg'=>'Thanks for Contacting us']);
      }
    else{
        echo "fff"; 
    }
}
}