<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CatagoryController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin',[AdminController::class,'index']);
Route::group(['middleware'=>'admin_auth'],function(){
    Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');  //admin@gmail.com  --> admin@123
    Route::get('admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get('admin/category',[CatagoryController::class,'index']);
    Route::get('admin/manage_category',[CatagoryController::class,'manage_category']);
});
