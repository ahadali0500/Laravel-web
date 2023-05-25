<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserCart extends Controller
{
    public function index(Request $request)
    {
         
         $inventryavailable=inventryavailable($request->product_id);
         if ($request->qty<=$inventryavailable) {
            
       
         $user_id=session()->get('user_id');
          $check=DB::table('cart')->where([
          'register_id' => $user_id,
          'product_id' => $request->product_id
          ])->get();
          
          if (isset($check[0])) {
              DB::table('cart')
              ->where([
             'register_id' => $user_id,
             'product_id' => $request->product_id,
              ])
              ->update([
              'product_qty' => $request->qty
              ]);
            return response()->json(['status'=>'again']);
          }else{
                   DB::table('cart')->insert([
                    'cart_id' => "cart-".rand(111,000),
                    'register_id' => $user_id,
                    'product_id' => $request->product_id,
                     'product_qty' => $request->qty
                  ]); 
                 return response()->json(['status'=>'success']);
          }
            }else{
                  return response()->json(['status'=>'inventryerror','msg'=> $inventryavailable . " Products Available"]);
            }
         
    }

    public function cart()
    {
        
       return view('user.cart');
    }
    public function cartqty(Request $request)
    {
        $cart=DB::table('cart')
        ->where([
        'cart_id' => $request->cart_id
        ])
        ->get();

         $inventryavailable=inventryavailable($cart[0]->product_id);
         if ($request->qty<=$inventryavailable) {
 DB::table('cart')
 ->where([
 'cart_id' => $request->cart_id
 ])
 ->update([
 'product_qty' => $request->qty,
 ]);
 return response()->json(['status'=>'success']);

         }else{
            return response()->json(['status'=>'inventryerror','msg'=> $inventryavailable . " Products
            Available",'cart_id'=> $request->cart_id]);
         }
       
    }
    public function cartqtydel(Request $request)
    {
    DB::table('cart')
    ->where([
    'cart_id' => $request->cart_id
    ])
    ->delete();
    return response()->json(['status'=>'success']);
    }
}