<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\register_success;
use App\Mail\forgotpassword;
class UserAuth extends Controller
{
    public function login()
    {
        return view('user.login');
    }
   
     public function register()
     {
     return view('user.register');
     }
      public function Register_process(Request $request)
      {
        $email = DB::table('register')
        ->where('register_email', '=', $request->email)
        ->get();
        if (isset($email[0])) {
               return response()->json(['status' => 'error1','msg'=>'This Email already Registered' ]);
        }
        else if($request->password!=$request->repeatpassword){
               return response()->json(['status' => 'error2','msg'=>'Password Not Matched' ]);
        }
        else{
          if ($request->newsletter=="") {
             $newsletter="off";
          }else{
             $newsletter="on";
          }
              DB::table('register')->insert([
              'register_id' => rand(11111111,00000000),
              'register_aboutyou' => "Null",
              'register_website' => "Null",
              'register_taxid' => "Null",
              'register_email' => $request->email,
              'register_password' => Crypt::encrypt($request->password),
              'register_firstname' => $request->firstname,
              'register_lastname' => $request->lastname,
              'register_company' => $request->company,
              'register_number' => $request->number,
              'register_address1' => $request->address1,
              'register_address2' => $request->address2,
              'register_city' => $request->city,
              'register_state' => $request->state,
              'register_zipcode' => $request->zipcode,
              'register_country' => $request->country,
              'register_find' => $request->find,
              'register_newsletter' => $newsletter
              ]);
              $mailData = [
              'name' => $request->firstname,
              ];

              Mail::to($request->email)->send(new register_success($mailData));
               return response()->json(['status' => 'success']);
        }
      
     
      }

      public function login_process(Request $request)
      {
            $email = DB::table('register')
            ->where('register_email', '=', $request->email)
            ->get();
            if (isset($email[0])) {
                 if($email[0]->register_status!=0){
                   if ($email[0]->register_status!="Disapprove") {                   
                     $password=Crypt::decrypt($email[0]->register_password);
                       if($password==$request->password){
                         session()->put('user_id',$email[0]->register_id);
                         return response()->json(['status' => 'success','msg'=>'Login Successfully Redirecting...' ]);
                       }else{
                         return response()->json(['status' => 'error','msg'=>'Invalid Credentials' ]);
                       }

                      }else{
                        return response()->json(['status' => 'error','msg'=>'Your Account is not Approved Contact us for any Query!' ]);
                      }
                 }else{
                  return response()->json(['status' => 'error','msg'=>'Your Account is pending for Approval' ]);
                 }
            }else{
                 return response()->json(['status' => 'error','msg'=>'Invalid Credentials' ]);
            }

      }

      public function fp_email()
      {
        return view('user.fp_email');
      }
      public function fp_email_process(Request $request)
      {
         $data = DB::table('register')
         ->where('register_email', '=', $request->email)
         ->get();
         if(isset($data[0])){
            $fp_id="fp_".rand(11111111,00000000);
           DB::table('register')
            ->where('register_email', '=', $request->email)
            ->update([
              'fp_id'=>$fp_id
            ]);
            $mailData = [
            'name' => $data[0]->register_firstname,
             'fp_id' => $fp_id,
            ];

             Mail::to($request->email)->send(new forgotpassword($mailData));
              return response()->json(['status' => 'success','msg'=>'Check Your  Mail To Recover Password' ]);
         }else{
           return response()->json(['status' => 'error','msg'=>'Email is not Registered' ]);
         }
      }


      public function fp_recoverpassword(Request $request)
      {
      
        $data = DB::table('register')
         ->where('fp_id', '=', $request->fp_id)
         ->get();
         if(isset($data[0])){
          $fp_id=$request->fp_id;
          return view('user.fp_password',compact('fp_id'));
         }else{
          return redirect('/');
         }
        
      }

      public function rp_process(Request $request)
      {
         if ($request->password>=6 && $request->repeatpassword>=6) {
          if ($request->password==$request->repeatpassword) {
            DB::table('register')
          ->where('fp_id', '=', $request->fp_id)
          ->update([
            'register_password'=>Crypt::encrypt($request->password),
            'fp_id'=>"fp_" . rand(11111,00000)
          ]); 
          return response()->json(['status' => 'success','msg'=>'Password Recover Successfully!' ]);
          }else{
            return response()->json(['status' => 'error','msg'=>'Your Password not Match!' ]);
          }
           
         }else{
          return response()->json(['status' => 'error','msg'=>'Password Length must be six Or above!' ]);
         }
        // $data = DB::table('register')
        //  ->where('fp_id', '=', $request->fp_id)
        //  ->get();
        //  if(isset($data[0])){
        //   $fp_id=$request->fp_id;
        //   return view('user.fp_password',compact('fp_id'));
        //  }else{
        //   return redirect('/');
        //  }
        
      }
      public function account()
      {
        $user_id=session()->get('user_id');
        $data['user1']=DB::table('register')->where([
        'register_id' => $user_id,
        ])->get();
        $data['order']=DB::table('order')->where([
        'user_id' => $user_id,
        ])->get();
        foreach ($data['order'] as  $value) {
           $data['order_detail'][$value->order_id]=DB::table('order_detail')->where([
           'order_id' => $value->order_id,
           ])->get();
        }
          return view('user.account',$data);
      }

      public function AccountUpdate_process(Request $request)
      {
        $user_id=session()->get('user_id');
        $update = DB::table('register')
        ->where(['register_id'=> $user_id])
        ->update([
              
          'register_firstname'=>$request->firstname,
          'register_lastname'=>$request->lastname,
          'register_company' => $request->company_name,
          'register_number' => $request->phone,
          'register_address1' => $request->street_address,
          'register_city' => $request->city,
              'register_state' => $request->state,
              'register_zipcode' => $request->zip_code,
              'register_country' => $request->conutry,
          'register_password' => Crypt::encrypt($request->password)
          
  
      ]);
      if ($update) {
         
          return response()->json(['status'=>'success','msg'=>'Data account successfully']);
        }
      else{
          echo "fff"; 
      }
  }
  public function passwordchange_process(Request $request)
  {  
    if(strlen($request->password)<6){
       return response()->json(['status'=>'error','msg'=>'Password must be six Character']);
    }else{
      $user_id=session()->get('user_id');
      $update = DB::table('register')
      ->where(['register_id'=> $user_id])
      ->update([
      'register_password' => Crypt::encrypt($request->password)
      ]);
       return response()->json(['status'=>'success','msg'=>'Password Updated Successfully']);
    }
     
  }
      public function orderdetail(request $request)
      {
          $user_id=session()->get('user_id');
          $order=DB::table('order')->where([
         'order_id' => $request->order_id,
          'user_id' => $user_id
         ])->get();
         if (isset($order[0])) {
            $data['order']=DB::table('order')->where([
            'user_id' => $user_id,
            'order_id' => $request->order_id,
            ])->get();
            foreach ($data['order'] as $value) {
            $data['order_detail'][$value->order_id]=DB::table('order_detail')->where([
            'order_id' => $value->order_id,
            ])
             ->leftJoin('product', 'product.product_id', '=', 'order_detail.order_product_id')
            ->get();
            }
            // echo"<pre>";
            // print_r($data);
            // die;
             $order_id=$request->order_id;
          return view('user.orderdetail',$data,compact('order_id'));
         }else{
          return redirect('/');
         }
      }
}