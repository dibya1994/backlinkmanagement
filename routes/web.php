<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\AdminController;



// Frontend Routes Start Here..........................................
Route::controller(HomeController::class)->group(function(){
    Route::get('/','index');
});

// Frontend Routes End Here..........................................


// Admin Routes Start Here..........................................
Route::controller(SuperadminController::class)->group(function(){
    Route::get('/superadmin','index');
    Route::post('/superadmin/login','login');
    Route::get('/superadmin/logout','logout');
});

Route::group(['middleware'=>'superadmin'],function(){
    Route::get('/superadmin/dashboard',[SuperadminController::class,'dashboard']);
    Route::get('/superadmin/profile',[SuperadminController::class,'profile']);
    Route::post('/superadmin/update_profile',[SuperadminController::class,'update_profile']);
    Route::post('/superadmin/update_password',[SuperadminController::class,'update_password']);
    Route::get('/superadmin/change-password',[SuperadminController::class,'change_password']);

    Route::resource('/superadmin/admin', AdminController::class);
    

    });

// Admin Routes End Here..........................................
