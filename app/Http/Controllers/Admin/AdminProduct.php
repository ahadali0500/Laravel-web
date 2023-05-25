<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
class AdminProduct extends Controller
{
    public function index()
    {
         $data['product'] = DB::table('product')
        ->get();
         return view('admin.product',$data);
    }
     public function addproduct()
     {
       $data['category'] = DB::table('category')
       ->get();
     return view('admin/addproduct',$data);
     }
     public function AddProduct_process(Request $request)
     {
         
       $product_id=rand(11111111,00000000);
       $data['product_category']= $request->category;
       $data['product_id']= $product_id;
       $data['product_name']=$request->name;
       $data['product_sku']=$request->sku;
       $data['product_price']=$request->price;
       $data['product_qty']=$request->qty;
       $data['product_mrp']=$request->mrp;
       $data['product_short_des']=$request->short_des;
       $data['product_long_des']=$request->long_des;
       $data['product_status']='1';
       if ($request->hasFile('imagea')) {
       $imagea = $request->file('imagea');
       $exta = $imagea->extension();
       $image_namea = rand() . '.' . $exta;
       $imagea->storeAs('/public/product', $image_namea);
       $data['product_imagea'] = $image_namea;
       }
       if ($request->hasFile('imageb')) {
       $imageb = $request->file('imageb');
       $extb = $imageb->extension();
       $image_nameb = rand() . '.' . $extb;
       $imageb->storeAs('/public/product', $image_nameb);
       $data['product_imageb'] = $image_nameb;
       }

        $product_img = $request->image;

        foreach ($product_img as $key => $value) {
        if ($request->hasFile("image.$key")) {
        $rand = rand('111111111', '999999999');
        $product_img = $request->file("image.$key");
        $ext = $product_img->extension();
        $image_name = $rand . '.' . $ext;
        $request->file("image.$key")->storeAs('/public/product', $image_name);
        $productimg['product_image'] = $image_name;
        $productimg['product_id'] = $product_id;
        }
        DB::table('product_image')->insert($productimg);
        }
       DB::table('product')->insert($data);
      return response()->json(['status'=>'success']);
     }
     public function productdelete(Request $request)
     {
           
            $pro=DB::table('product')->where(['product_id'=>$request->product_id])->get();
              Storage::delete('/public/product/' . $pro[0]->product_imagea);
              Storage::delete('/public/product/' . $pro[0]->product_imageb);
            DB::table('product')->where(['product_id'=>$request->product_id])->delete();
            $pd=DB::table('product_image')->where(['product_id'=>$request->product_id])->get();
            foreach ($pd as  $value) {
               Storage::delete('/public/product/' . $value->product_image);
                DB::table('product_image')->where(['product_id'=>$request->product_id])->delete();
            }
            return response()->json(['status'=>'success']);
     }
     public function product_status(Request $request)
     {
     
      $product=DB::table('product')
      ->where(['product_id'=>$request->product_id])
      ->get();
      if($product[0]->product_status==1){
      $product=DB::table('product')
      ->where(['product_id'=>$request->product_id])
      ->update([
      'product_status'=>0
      ]);
      return response()->json(['status'=>'success','msg'=>'product deactivated Successully']);
      }else{
      $product=DB::table('product')
      ->where(['product_id'=>$request->product_id])
      ->update([
      'product_status'=>1
      ]);
      return response()->json(['status'=>'success','msg'=>'product Activated Successully']);
     }
    }
    public function updateproduct(Request $request)
    {
      $data['product']=DB::table('product')
     ->where(['product_id'=>$request->product_id])
     ->get();
      $data['category']=DB::table('category')
      ->get();
      $data['product_image']=DB::table('product_image')
      ->where(['product_id'=>$request->product_id])
      ->get();
     return view("admin.updateproduct",$data);
    }
    public function pidel(Request $request)
    {
       $data=DB::table('product_image')
       ->where(['id'=>$request->id])
       ->get();
        Storage::delete('/public/product/' . $data[0]->product_image);
         $data['product_image']=DB::table('product_image')
         ->where(['id'=>$request->id])
         ->delete();
         return response()->json(['status'=>'success']);
    }
    public function UpProduct_process(Request $request)
    {
         $data['product_category']= $request->category;
         $data['product_name']=$request->name;
         $data['product_sku']=$request->sku;
         $data['product_price']=$request->price;
         $data['product_qty']=$request->qty;
         $data['product_mrp']=$request->mrp;
         $data['product_short_des']=$request->short_des;
         $data['product_long_des']=$request->long_des;
         $product=DB::table('product')
         ->where(['product_id'=>$request->product_id])
         ->get();
         if ($request->hasFile('imagea')) {
         $imagea = $request->file('imagea');
         $exta = $imagea->extension();
         $image_namea = rand() . '.' . $exta;
         Storage::delete('/public/product/' . $product[0]->product_imagea);
         $imagea->storeAs('/public/product', $image_namea);    
          
         $data['product_imagea'] = $image_namea;
         }
         if ($request->hasFile('imageb')) {
         $imageb = $request->file('imageb');
         $extb = $imageb->extension();
         $image_nameb = rand() . '.' . $extb;
         $imageb->storeAs('/public/product', $image_nameb);
            Storage::delete('/public/product/' . $product[0]->product_imageb);        
         $data['product_imageb'] = $image_nameb;
         }

         $product_img = $request->image;
         if (isset($product_img[0])) {
          
         
         foreach ($product_img as $key => $value) {
         if ($request->hasFile("image.$key")) {
         $rand = rand('111111111', '999999999');
         $product_img = $request->file("image.$key");
         $ext = $product_img->extension();
         $image_name = $rand . '.' . $ext;
         $request->file("image.$key")->storeAs('/public/product', $image_name);
         $productimg['product_image'] = $image_name;
         $productimg['product_id'] = $request->product_id;
         }
         DB::table('product_image')->insert($productimg);
         }}
         DB::table('product')->where(['product_id'=>$request->product_id])->update($data);
         return response()->json(['status'=>'success']);
    }

}