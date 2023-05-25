<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserShop extends Controller
{
   public function shop(Request $request)
   {
    $category=$request->get('category');
    $minprice=$request->get('minprice');
    $maxprice=$request->get('maxprice');
     $category_id="";
     $maxprice="";
     $minprice="";
    if ($request->get('category')!='') {
    $category_id= $request->get('category');
    }
    if ($request->get('minprice')!='') {
    $minprice= $request->get('minprice');
    }
    if ($request->get('maxprice')!='') {
    $maxprice= $request->get('maxprice');
    }
     $data['shop'] = DB::table('product');
     $data['shop'] =$data['shop']->where('product_status', '=', 1);
     if ($category_id!='') {
     $data['shop'] = $data['shop']->where(['product_category'=> $category_id]);
     }
      if ($minprice!='' && $maxprice!='') {
      $data['shop'] = $data['shop']->whereBetween('product_price',[$minprice,$maxprice]);
      }
     $data['shop'] =$data['shop']->orderBy('id', 'desc')->get();
     foreach ($data['shop'] as $value) {
         $data['shoppic'][$value->product_id] = DB::table('product_image')
         ->where('product_id', '=', $value->product_id)
         ->get();
     }
    //  echo"<pre>";
    //  print_r($data);
    //  die;
     return view('user.shop',$data,compact('category','maxprice','minprice'));
   }

   public function shopcate(Request $request)
   {
     
     $data['shop'] =DB::table('product')
     ->where('product_status', '=', 1)
      ->where('product_category', '=', $request->category_id)
     ->get();
     foreach ($data['shop'] as $value) {
         $data['shoppic'][$value->product_id] = DB::table('product_image')
         ->where('product_id', '=', $value->product_id)
         ->get();
     }
    //  echo"<pre>";
    //  print_r($data);
    //  die;
     return view('user.shop',$data);
   }
   public function productdetail(Request $request)
   {
 
   $data['shop'] = DB::table('product')
   ->where('product_status', '=', 1)
   ->where('product_id', '=', $request->product_id)
   ->get();

   $data['shoppic'] = DB::table('product_image')
   ->where('product_id', '=',$request->product_id)
   ->get();


        $data['shopcate'] = DB::table('product')
        ->where('product_status', '=', 1)
        ->where('product_category', '=', $data['shop'][0]->product_category)
         ->where('product_id', '!=', $data['shop'][0]->product_id)
        ->get();
   

   
//    echo"<pre>";
//      print_r($data);
//      die;
     return view('user.productdetail',$data);
   }
   public function test(Request $request)
   {
      echo $request->get('val');
   }
}


// $cc=explode(" - ",$pricev);
// $min= substr($cc[0],1);
// $max= substr($cc[1],1);