<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\order;
class UserCheckout extends Controller
{
    public function checkout()
    {
        $user_id=session()->get('user_id');
        $data['user']=DB::table('register')->where([
        'register_id' => $user_id,
        ])->get();
        $data['cart']=DB::table('cart')->where([
            'register_id' => $user_id,
            ])
            ->leftJoin('product', 'product.product_id', '=', 'cart.product_id')
            ->select('product.product_name', 'cart.product_qty', 'product.product_price')
            ->get();
            // echo "<pre>";
            // print_r($data['cart']);
            // die;
        return view('user.checkout',$data);
    }
    public function checkout_process(Request $request)
    {
        $user_id=session()->get('user_id');
        $order_id="ord-".rand(111111111,000000000);
        $data['order']=DB::table('order')->insert([
            'order_id' => $order_id,
            'user_id' => $user_id,
            'order_first_name' => $request->first_name,
            'order_last_name' =>$request->last_name,
            'order_company_name' => $request->company_name,
            'order_conutry' => $request->conutry,
            'order_street_address' => $request->street_address,
            'order_city' => $request->city,
            'order_state' => $request->state,
            'order_zip_code' => $request->zip_code,
            'order_phone' => $request->phone,
            'order_order_note' => $request->ordernote,
            'order_total' => $request->total,
            'order_status' => 'pending',
            'order_date'=>date('m/d/Y')
        ]);
        $cart=DB::table('cart')->where([
            'register_id' => $user_id,
            ])->get();
        foreach ($cart as  $value) {
            DB::table('order_detail')->insert([
                'order_id' => $order_id,
                'order_product_id' => $value->product_id,
                'order_product_qty' => $value->product_qty
            ]);
             $inventryavailable=inventryavailable($value->product_id);
            if ($inventryavailable==0) {
                 $cart=DB::table('product')->where([
                 'product_id' => $value->product_id,
                 ])->update([
                    'inventry_status'=>'sold'
                 ]);
            }
        }    
        $cart=DB::table('cart')->where([
            'register_id' => $user_id,
            ])->delete();
            $mailData = [
            'name' => $request->first_name,
              'order_id' => $order_id,
            ];

             Mail::to($request->email)->send(new order($mailData));
        return response()->json(['status'=>'success','msg'=>'Order Placed Successfully','order_id'=>$order_id]);    
    }
}