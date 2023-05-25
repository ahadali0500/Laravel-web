<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
class AdminSlider extends Controller
{
      public function index()
      {
      $data['slider'] = DB::table('slider')
      ->get();
      return view('admin.slider',$data);
      }
       public function addslider()
       {

       return view('admin.addslider');
       }
       public function AddSlider_process(Request $request)
       {
         $data['slider_title']=$request->title;
         $data['slider_heading']=$request->heading;
         $data['slider_link']=$request->link;
         $data['slider_id']=rand(111,000);
        if ($request->hasFile('image')) {
        $image = $request->file('image');
        $extb = $image->extension();
        $image_nameb = rand() . '.' . $extb;
        $image->storeAs('/public/slider', $image_nameb);
        $data['slider_image'] = $image_nameb;
        }
         DB::table('slider')->insert($data);
       return response()->json(['status'=>'success']);
       }
       public function sliderdelete(Request $request)
       {  
         $slider=DB::table('slider')->where(['slider_id'=>$request->slider_id])->get();
           Storage::delete('/public/slider/' . $slider[0]->slider_image);
         DB::table('slider')->where(['slider_id'=>$request->slider_id])->delete();
          return response()->json(['status'=>'success','msg'=>"Slider Deleted Successfully"]);
       }
       public function updateslider(Request $request)
       {
        $data['slider']=DB::table('slider')
        ->where(['slider_id'=>$request->slider_id])
        ->get();
        return view("admin.updateslider",$data);
       }

       public function UpSlider_process(Request $request)
       {
          $data['slider_title']=$request->title;
          $data['slider_heading']=$request->heading;
          $data['slider_link']=$request->link;
          if ($request->hasFile('image')) {
          $image = $request->file('image');
          $extb = $image->extension();
          $image_nameb = rand() . '.' . $extb;
          $image->storeAs('/public/slider', $image_nameb);
          $slider=DB::table('slider')
          ->where(['slider_id'=>$request->slider_id])
          ->get();
            Storage::delete('/public/slider/' . $slider[0]->slider_image);
          $data['slider_image'] = $image_nameb;
          }
          DB::table('slider')->where(['slider_id'=>$request->slider_id])->update($data);
           return response()->json(['status'=>'success']);
       }

}