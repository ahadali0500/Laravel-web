<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminDashboard extends Controller
{
  public function index()
  {
     $data['product']=DB::table('product')
    ->get();
    $data['activeproduct']=DB::table('product')
    ->where(['product_status'=>1])
    ->get();
    $data['disactiveproduct']=DB::table('product')
    ->where(['product_status'=>0])
    ->get();
    $data['category']=DB::table('category')
    ->get();
     $data['activecategory']=DB::table('category')
     ->where(['category_status'=>1])
     ->get();
      $data['disactivecategory']=DB::table('category')
      ->where(['category_status'=>0])
      ->get();
       $data['slider']=DB::table('slider')
       ->get();
        $data['activeregister']=DB::table('register')
        ->where(['register_status'=>'Approve'])
        ->get();
         $data['pendingregister']=DB::table('register')
         ->where(['register_status'=>'0'])
         ->get();
            $data['disactiveregister']=DB::table('register')
             ->where(['register_status'=>'Disapprove'])
            ->get();
              $data['register']=DB::table('register')
              ->get();
               $data['contact']=DB::table('contact')
               ->get();

                 $data['pendingorder']=DB::table('order')
                   ->where(['order_status'=>'pending'])
                 ->get();
                   $data['deliveredorder']=DB::table('order')
                   ->where(['order_status'=>'delivered'])
                   ->get();
                    $data['shippedorder']=DB::table('order')
                    ->where(['order_status'=>'shipped'])
                    ->get();
                    $data['order']=DB::table('order')
                    ->get();
   return view('admin.dashboard',$data);
  }
}