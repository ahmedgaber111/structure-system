<?php

use App\Http\Controllers\Admin\Admin_loginController;
use App\Http\Controllers\Admin\BusinessController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::redirect('/','showloginform');
Route::middleware('admin')->group(function(){
    Route::get('user',[AdminUserController::class,'index'])->name('user');
    Route::post('store',[AdminUserController::class,'store'])->name('new_user');
    Route::get('user-create',[AdminUserController::class,'create'])->name('user.create');
    Route::get('user-delete/{id}',[AdminUserController::class,'destroy'])->name('user.delete');

    Route::get('businesses',[BusinessController::class,'index'])->name('businesses');
    Route::post('business-store',[BusinessController::class,'store'])->name('new_business');
    Route::get('business-create',[BusinessController::class,'create'])->name('business.create');
    Route::get('business-edit/{id}',[BusinessController::class,'edit'])->name('business.edit');
    Route::post('business-update/{id}',[BusinessController::class,'update'])->name('business-update');
    Route::get('business-delete/{id}',[BusinessController::class,'destroy'])->name('business.delete');
});

Route::post('admin_login',[Admin_loginController::class,'login'])->name('admin_login');
Route::get('showloginform',[Admin_loginController::class,'showloginform'])->name('login_form');
Route::get('logout',[Admin_loginController::class,'logout'])->name('logout');