<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\orderstatus;



class AdminOrder extends Controller
{
    public function order()
    {
          $data['order']=DB::table('order')
           ->orderBy('id', 'desc')
          ->get();
          return view('admin.order',$data);
    }
    public function orderstatus_process(Request $request)
    {
          $data['order']=DB::table('order')
          ->where(['order_id' => $request->order_id])
          ->update([
            'order_status' => $request->status
          ]);
          $userorder=DB::table('order')
          ->where(['order_id' => $request->order_id])
          ->get();
           $user=DB::table('register')
           ->where(['register_id' => $userorder[0]->user_id])
           ->get();

          $mailData=[
          'name'=>$user[0]->register_firstname,
          'order_id'=>$request->order_id,
          'status'=>$request->status
          ];
          Mail::to($user[0]->register_email)->send(new orderstatus($mailData));
          
          return response()->json(['status'=>'success','msg'=>'Status Updated Successfully']);
    }
    public function orderdetail(Request $request)
    {
        $data['order']=DB::table('order')
        ->where(['order_id'=>$request->order_id])
        ->get();
        foreach ($data['order'] as $value) {
            $data['order_detail'][$value->order_id]=DB::table('order_detail')
            ->where(['order_id'=>$value->order_id])
             ->leftJoin('product', 'product.product_id', '=', 'order_detail.order_product_id')
            ->get();
        }
        return view('admin.orderdetail',$data);
    }
}