<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
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
Route::get('admin/coupon/edit/{id}',[CouponController::class,'show_coupon_edit_form']);
Route::post('admin/coupon/update',[CouponController::class,'update_coupon_record']);
    //UPDATE COUPON END 

    Route::get('admin/coupon/status/{status}/{id}', [CouponController::class, 'status']);
});
