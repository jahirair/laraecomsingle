<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\ClientController;



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [HomeController::Class, 'redirect'])->name('dashboard');
});

Route::get('/redirect', [HomeController::Class, 'redirect']);
Route::get('/logout', [HomeController::Class, 'perform']);

Route::controller(ClientController::class)->group(function(){
       Route::get('/category/{id}','categorypage')->name('categorypage');       
       Route::get('/product-details/{id}/{slug}','singleproductpage')->name('singleproductpage');
       
       Route::get('/new-release','newreleasepage')->name('newreleasepage');
       Route::get('/todays-deal','todaysdealpage')->name('todaysdealpage');
       Route::get('/custom-service','customservicepage')->name('customservicepage');
    });

   Route::middleware(['auth'])->group(function () {
    Route::controller(ClientController::class)->group(function(){
       Route::get('/user-profile','userprofilepage')->name('userprofilepage');
       Route::get('/user-profile/pending-orders','userpendingorder')->name('userpendingorder');
       
       Route::get('/user-profile/history','userhistory')->name('userhistory');
       Route::get('/user-profile/canceled-order/{id}','cancelorder')->name('cancelorder');
       
       Route::post('/add-product-to-cart/{id}','addproducttocart')->name('addproducttocart');
      Route::get('/add-to-cart','addtocartpage')->name('addtocartpage');
      Route::get('/delete-cart/{id}','deletecart')->name('deletecart');
      Route::get('/shipping-address', 'shippingaddress')->name('shippingaddress');
      Route::post('/store-shippingaddress','storeshippingaddress')->name('storeshippingaddress');
      Route::post('/store-order','storeorder')->name('storeorder');

       Route::get('/checkout','checkoutpage')->name('checkoutpage');
       
    });
   });

Route::middleware(['auth'])->group(function () {
    Route::controller(DashBoardController::class)->group(function(){
       Route::get('/admin/dashboard','index')->name('admindashboard'); 
    });

    Route::controller(CategoryController::class)->group(function(){
       Route::get('/admin/all-category','index')->name('allcategory'); 
       Route::get('/admin/add-category','addcategory')->name('addcategory');
       Route::post('/admin/store-category','storecategory')->name('storecategory');
       Route::get('/admin/edit-category/{id}','editcategory')->name('editcategory');
       Route::post('/admin/update-category','updatecategory')->name('updatecategory');
       Route::get('/admin/delete-category/{id}','deletecategory')->name('deletecategory');
       
    });

    Route::controller(SubCategoryController::class)->group(function(){
       Route::get('/admin/all-subcategory','index')->name('allsubcategory'); 
       Route::get('/admin/add-subcategory','addsubcategory')->name('addsubcategory');
       Route::post('/admin/store-subcategory','storesubcategory')->name('storesubcategory');
       Route::get('/admin/edit-subcategory/{id}','editsubcategory')->name('editsubcategory');
       Route::post('/admin/update-subcategory','updatesubcategory')->name('updatesubcategory');
       Route::get('/admin/delete-subcategory/{id}','deletesubcategory')->name('deletsubecategory');
    });

    Route::controller(ProductController::class)->group(function(){
       Route::get('/admin/all-products','index')->name('allproducts'); 
       Route::get('/admin/add-product','addproduct')->name('addproduct');
       Route::post('/admin/store-product','storeproduct')->name('storeproduct');
       Route::get('/admin/edit-product/{id}','editproduct')->name('editproduct');
       Route::post('/admin/update-product','updateproduct')->name('updateproduct');
       Route::get('/admin/delete-product/{id}','deleteproduct')->name('deleteproduct');
       Route::get('/admin/edit-product-image/{id}','editproductimage')->name('editproductimage');
       Route::post('/admin/update-product-image','updateproductimage')->name('updateproductimage');

    });

    Route::controller(OrderController::class)->group(function(){
       Route::get('/admin/pendingorder','index')->name('pendingorder');
       Route::get('/admin/completeorders','completeorders')->name('completeorders');
       Route::get('/admin/cancelledorders','cancelledorders')->name('cancelledorders');       
       Route::get('/admin/delete-cancelledorder/{id}','deletecancelledorder')->name('deletecancelledorder'); 
       Route::get('/admin/completestatus/{id}','completestatus')->name('completestatus'); 
    });
    
});

