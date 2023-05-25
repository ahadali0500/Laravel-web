<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserHome extends Controller
{
   public function index()
   {

    $data['slider'] = DB::table('slider')
    ->get();
    $data['product'] = DB::table('product')->orderBy('id', 'desc')->where(['product_status'=>1])
    ->get();
    return view('user.index',$data);
   }

   
}