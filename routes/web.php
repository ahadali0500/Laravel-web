<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuth;
use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Admin\AdminProduct;
use App\Http\Controllers\Admin\AdminCategory;
use App\Http\Controllers\Admin\AdminSlider;
use App\Http\Controllers\User\UserHome;
use App\Http\Controllers\User\UserAuth;
use App\Http\Controllers\User\UserShop;
use App\Http\Controllers\User\UserCart;
use App\Http\Controllers\User\UserContact;
use App\Http\Controllers\User\UserCheckout;
use App\Http\Controllers\Admin\AdminCustomer;
use App\Http\Controllers\Admin\AdminOrder;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
   
// });



// Admin Routes
 Route::get('admin/', [AdminAuth::class, 'index']);
 Route::post('admin/AdminAuth_process', [AdminAuth::class, 'AdminAuth_process']);
 Route::group(['middleware' => 'AdminAuth'], function () {
 Route::get('admin/dashboard', [AdminDashboard::class, 'index']);
 Route::get('admin/product', [AdminProduct::class, 'index']);
 Route::get('admin/product/add', [AdminProduct::class, 'addproduct']);
 Route::post('admin/AddProduct_process', [AdminProduct::class, 'AddProduct_process']);
  Route::post('admin/UpProduct_process', [AdminProduct::class, 'UpProduct_process']);
  Route::post('admin/productdelete', [AdminProduct::class, 'productdelete']);
    Route::post('admin/product_status', [AdminProduct::class, 'product_status']);
    Route::get('/admin/product/update/{product_id}', [AdminProduct::class, 'updateproduct']);
    Route::post('/admin/pidel/', [AdminProduct::class, 'pidel']);
    
 Route::get('admin/category', [AdminCategory::class, 'index']);
 Route::get('admin/category/add', [AdminCategory::class, 'addcategory']);
 Route::post('admin/AddCategory_process', [AdminCategory::class, 'AddCategory_process']);
 Route::post('admin/categorystatus_process', [AdminCategory::class, 'categorystatus_process']);
 Route::post('admin/categorydelete_process', [AdminCategory::class, 'categorydelete_process']);
  Route::get('/admin/category/update/{category_id}', [AdminCategory::class, 'updatecategory']);
  Route::post('/admin/UpCategory_process', [AdminCategory::class, 'UpCategory_process']);
  
 Route::get('admin/slider', [AdminSlider::class, 'index']);
 Route::get('admin/slider/add', [AdminSlider::class, 'addslider']);
 Route::post('admin/AddSlider_process', [AdminSlider::class, 'AddSlider_process']);
  Route::post('admin/sliderdelete/', [AdminSlider::class, 'sliderdelete']);
   Route::get('/admin/slider/update/{slider_id}', [AdminSlider::class, 'updateslider']);
   Route::post('/admin/UpSlider_process/', [AdminSlider::class, 'UpSlider_process']);
   
 Route::get('admin/customer', [AdminCustomer::class, 'customer']);
 Route::post('admin/userapproval_process', [AdminCustomer::class, 'userapproval_process']);
 Route::get('/admin/message', [AdminCustomer::class, 'messages']);
 Route::get('/admin/order', [AdminOrder::class, 'order']);
  Route::get('/admin/orderdetail/{order_id}', [AdminOrder::class, 'orderdetail']);
 
  Route::post('/admin/orderstatus_process', [AdminOrder::class, 'orderstatus_process']);
 Route::get('admin/logout', function () {
session()->forget('admin');
session()->flash('adminloginerror', '<script>
    toastr.success("logout Successfully")
</script>');
return redirect('admin');
});
 });



 // user route
 Route::group(['middleware' => 'UserAuth'], function () {

 
 Route::get('/UserAccount', [UserAuth::class, 'account']);
 Route::post('/AccountUpdate_process', [UserAuth::class, 'AccountUpdate_process']);
 Route::post('/passwordchange_process', [UserAuth::class, 'passwordchange_process']);
 Route::post('addtocart_process', [UserCart::class, 'index']);
 Route::get('/cart', [UserCart::class, 'cart']);
 Route::post('/cartqty_process', [UserCart::class, 'cartqty']);
 Route::post('/cartqtydel_process', [UserCart::class, 'cartqtydel']);
 Route::get('/checkout', [UserCheckout::class, 'checkout']);
 Route::post('/checkout_process', [UserCheckout::class, 'checkout_process']);
 Route::get('/orderdetail/{order_id}', [UserAuth::class, 'orderdetail']);

 });


  Route::group(['middleware' => 'userauthns'], function () {

 Route::get('/register', [UserAuth::class, 'register']);
 Route::post('/Register_process', [UserAuth::class, 'Register_process']);
 Route::post('/login_process', [UserAuth::class, 'login_process']);
 Route::get('/login', [UserAuth::class, 'login']);
 Route::get('/forgotpassword', [UserAuth::class, 'fp_email']);
 Route::post('/fp_email_process', [UserAuth::class, 'fp_email_process']);
 Route::get('/fp_recoverpassword/{fp_id}', [UserAuth::class, 'fp_recoverpassword']);
 Route::post('/rp_process', [UserAuth::class, 'rp_process']);

  });


    Route::get('/', [UserHome::class, 'index']);
    Route::get('/products', [UserHome::class, 'products']); 
    Route::get('/shop', [UserShop::class, 'shop']);
    Route::get('/productdetail/{product_id}', [UserShop::class, 'productdetail']);
    Route::post('/pricefilter_process', [UserShop::class, 'pricefilter_process']);
    Route::get('/contact', [UserContact::class, 'index']);
    Route::post('/AddContact_process', [UserContact::class, 'AddContact_process']);


    

    Route::get('/logout', function () {
          session()->forget('user_id');
          return redirect('/');
    });  