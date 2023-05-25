<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminCategory extends Controller
{
    public function index()
    {
      $data['category'] = DB::table('category')
      ->get();
    return view('admin.category',$data);
    }
    public function addcategory()
    {
    return view('admin.addcategory');
    }
    public function AddCategory_process(Request $request)
    {
       if ($request->name=="") {
        return response()->json(['status'=>'emptyname','msg'=>'Name Feild is Empty!']);
       }else{
        $category_id=rand(111111,000000);
        DB::table('category')->insert([
        'category_id' => $category_id,
        'category_name' => $request->name,
        'category_status' => '1'
        ]);
          return response()->json(['status'=>'success','msg'=>'Category added successfully']);
       }
    }
    public function categorystatus_process(Request $request)
    {
         $category=DB::table('category')
         ->where(['category_id'=>$request->category_id])
         ->get();
         if($category[0]->category_status==1){
 $category=DB::table('category')
 ->where(['category_id'=>$request->category_id])
 ->update([
  'category_status'=>0
 ]);
 return response()->json(['status'=>'success','msg'=>'Category deactivated Successully']);
         }else{
 $category=DB::table('category')
 ->where(['category_id'=>$request->category_id])
 ->update([
 'category_status'=>1
 ]);
 return response()->json(['status'=>'success','msg'=>'Category Activated Successully']);
         }
          
    }
    public function categorydelete_process(Request $request)
    {
      $category=DB::table('category')
      ->where(['category_id'=>$request->category_id])
      ->delete();
      return response()->json(['status'=>'success','msg'=>'Category deleted Successully']);
    }
    public function updatecategory(Request $request)
    {  
        $data['category']=DB::table('category')
        ->where(['category_id'=>$request->category_id])
        ->get();
       return view("admin.updatecategory",$data);
    }
    public function UpCategory_process(Request $request)
    {
      $category=DB::table('category')
      ->where(['category_id'=>$request->category_id])
      ->update([
      'category_name'=>$request->name
      ]);
      return response()->json(['status'=>'success','msg'=>'Category Updated Successully']);
    }
}