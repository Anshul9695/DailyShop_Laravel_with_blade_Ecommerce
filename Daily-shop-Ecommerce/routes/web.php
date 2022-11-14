<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CoustomerController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use Illuminate\Support\Facades\Route;

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

// FONTEND CONTROLLERS  
Route::get('/',[FrontController::class,'index']);

// BACKEND CONTROLLERS 
Route::get('admin', [AdminController::class, 'index']);
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');
Route::group(['middleware' => 'admin_auth'], function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('admin/category', [CategoryController::class, 'index']);
    Route::get('admin/create_category', [CategoryController::class, 'create_category'])->name('create_category');
    Route::post('admin/manage_category_process', [CategoryController::class, 'insert'])->name('manage_category_process');
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
    //update the category 
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'showData']);
    Route::post('admin/category/update', [CategoryController::class, 'update_category']);
    //update the status of category 

    Route::get('admin/category/status/{status}/{id}', [CategoryController::class, 'status'])->name('status');
    // Route::get('admin/updatePassword',[AdminController::class,'updatePassword']);
    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('error', 'LogOut Successfylly..');
        return redirect('admin');
    });



    //    COUPON MANAGER FROM HERE .. 
    Route::get('admin/coupon/index_coupon', [CouponController::class, 'index']);
    Route::post('admin/coupon/create_coupon', [CouponController::class, 'create'])->name('create_coupon');
    Route::get('admin/coupon/coupon_list', [CouponController::class, 'Coupon_list']);
    Route::get('admin/coupon/delete/{id}', [CouponController::class, 'delete'])->name('delete');
    //UPDATE THE COUPON
    Route::get('admin/coupon/edit/{id}', [CouponController::class, 'show_coupon_edit_form']);
    Route::post('admin/coupon/update', [CouponController::class, 'update_coupon_record']);
    //UPDATE COUPON END 
    Route::get('admin/coupon/status/{status}/{id}', [CouponController::class, 'status']);

    // ATTRIBUTS MANAGER SIZE... 
    Route::get('admin/size/index', [SizeController::class, 'index']);
    Route::post('admin/size/create', [SizeController::class, 'create']);
    Route::get('admin/size/size_list', [SizeController::class, 'size_list']);
    Route::get('admin/size/delete/{id}', [SizeController::class, 'delete']);
    Route::get('admin/size/status/{status}/{id}', [SizeController::class, 'status']);
    Route::get('admin/size/edit/{id}', [SizeController::class, 'show_size_edit_form']);
    Route::post('admin/size/update', [SizeController::class, 'update_size_record']);

        // ATTRIBUTS MANAGER color... 
        Route::get('admin/color/index', [ColorController::class, 'index']);
        Route::post('admin/color/create', [ColorController::class, 'create']);
        Route::get('admin/color/color_list', [ColorController::class, 'color_list']);
        Route::get('admin/color/delete/{id}', [ColorController::class, 'delete']);
        Route::get('admin/color/status/{status}/{id}', [ColorController::class, 'status']);
        Route::get('admin/color/edit/{id}', [ColorController::class, 'show_color_edit_form']);
        Route::post('admin/color/update', [ColorController::class, 'update_color_record']);


        // PRODUCT SECTION START FROM HERE....... 
        Route::get('admin/product/index',[ProductController::class,'index']);
        Route::post('admin/product/create',[ProductController::class,'create']);
        Route::get('admin/product/list',[ProductController::class,'product_list']);
        Route::get('admin/product/delete/{id}',[ProductController::class,'product_delete']);
        Route::get('admin/product/status/{status}/{id}', [ProductController::class, 'status']);
        Route::get('admin/product/edit/{id}',[ProductController::class,'edit_prodcut']);
        Route::post('admin/product/update',[ProductController::class,'product_update']);


//CREATE AND UPDATE FROM SAME FORM 
        Route::get('admin/product/brand/list',[BrandController::class,'index']);
        Route::get('admin/product/brand/create',[BrandController::class,'manage_brands']);
        Route::get('admin/product/brand/create/{id}',[BrandController::class,'manage_brands']);
        Route::post('admin/product/brand/manage_process',[BrandController::class,'manage_brands_process']);
        Route::get('admin/product/brand/delete/{id}',[BrandController::class,'delete_brand']);
        Route::get('admin/product/brand/status/{status}/{id}', [BrandController::class, 'status']);

//CREATE BLOG POST 
Route::get('admin/blog_post/create',[BlogPostController::class,'index']);
Route::post('admin/blog/create',[BlogPostController::class,'create'])->name('create_blog_post');
        //MANAGE COUSTOMER'S FROM HERE.........

        Route::get('admin/coustomer/list',[CoustomerController::class,'index']);
        Route::get('admin/coustomer/status/{status}/{id}', [CoustomerController::class, 'status']);

        Route::get('admin/coustomer/single/{id}',[CoustomerController::class,'single_coustomer']);

});
