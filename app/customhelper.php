<?php 
use Illuminate\Support\Facades\DB;
if (! function_exists('addtocartnum')) {
function addtocartnum() {
    $user_id=session()->get('user_id');
  $num=DB::table('cart')->where([
  'register_id' => $user_id
  ])->get();
  $num=count($num);
   return $num;
}
}

if (! function_exists('addtocartdata')) {
function addtocartdata() {
$user_id=session()->get('user_id');
$data['cart']=DB::table('cart')->where([
'register_id' => $user_id
])->get();
foreach ($data['cart'] as $value) {
    $data['datacart'][$value->product_id]=DB::table('product')->where([
    'product_id' => $value->product_id
    ])->get();
}
return $data;
}
}

if (! function_exists('categories')) {
function categories() {
$data['category']=DB::table('category')->where([
'category_status' => 1
])->get();

return $data;
}
}

if (! function_exists('inventryavailable')) {
function inventryavailable($product_id) {
    
$product=DB::table('product')->where([
'product_id' => $product_id
])->get();

$saleproduct=0;
$order_detail=DB::table('order_detail')->where([
'order_product_id' => $product_id
])->get();
if (isset($order_detail[0])) {
    foreach ($order_detail as $value) {
       $saleproduct=$saleproduct + $value->order_product_qty;
    }
}


 $inventryavailable=$product[0]->product_qty - $saleproduct;
return $inventryavailable;
}
}
if (! function_exists('sellproduct')) {
function sellproduct($product_id) {


$saleproduct=0;
$order_detail=DB::table('order_detail')->where([
'order_product_id' => $product_id
])->get();

if (isset($order_detail[0])) {
foreach ($order_detail as $value) {
$saleproduct=$saleproduct + $value->order_product_qty;
}
}

return $saleproduct;
}
}
?>