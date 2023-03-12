<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TermsconditionController;
use App\Http\Controllers\PrivacypolicyController;
use App\Http\Controllers\AboutusController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\DigitalmarketerController;
use App\Http\Controllers\ContentcreatorController;
use App\Http\Controllers\BacklinkmanagerController;
use App\Http\Controllers\BacklinkController;



// Frontend Routes Start Here..........................................
Route::controller(HomeController::class)->group(function(){
    Route::get('/','index');
});

// Frontend Routes End Here..........................................


// Super Admin Routes Start Here..........................................
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
    Route::resource('/superadmin/termscondition', TermsconditionController::class);
    Route::resource('/superadmin/privacypolicy', PrivacypolicyController::class);
    Route::resource('/superadmin/aboutus', AboutusController::class);
    Route::resource('/superadmin/package', PackageController::class);
    

    });

// Super Admin Routes End Here..........................................



// Admin Routes Start Here..........................................
Route::controller(AdminController::class)->group(function(){
    Route::get('/admin','index2');
    Route::post('/admin/login','login');
    Route::get('/admin/logout','logout');
});

Route::group(['middleware'=>'admin'],function(){
    Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
    Route::get('/admin/profile',[AdminController::class,'profile']);
    Route::post('/admin/update_profile',[AdminController::class,'update_profile']);
    Route::post('/admin/update_password',[AdminController::class,'update_password']);
    Route::get('/admin/change-password',[AdminController::class,'change_password']);

    Route::resource('/admin/digitalmarketer', DigitalmarketerController::class);
    Route::resource('/admin/contentcreator', ContentcreatorController::class);
    Route::resource('/admin/backlinkmanager', BacklinkmanagerController::class);
    
   

    });

// Super Admin Routes End Here..........................................


// Digital Marketer Routes Start Here..........................................
Route::controller(DigitalmarketerController::class)->group(function(){
    Route::get('/digitalmarketer','index2');
    Route::post('/digitalmarketer/login','login');
    Route::get('/digitalmarketer/logout','logout');
});

Route::group(['middleware'=>'digitalmarketer'],function(){
    Route::get('/digitalmarketer/dashboard',[DigitalmarketerController::class,'dashboard']);
    Route::get('/digitalmarketer/profile',[DigitalmarketerController::class,'profile']);
    Route::post('/digitalmarketer/update_profile',[DigitalmarketerController::class,'update_profile']);
    Route::post('/digitalmarketer/update_password',[DigitalmarketerController::class,'update_password']);
    Route::get('/digitalmarketer/change-password',[DigitalmarketerController::class,'change_password']);
    });

// Digital Marketer Routes End Here..........................................



// Content Creator Routes Start Here..........................................
Route::controller(ContentcreatorController::class)->group(function(){
    Route::get('/contentcreator','index2');
    Route::post('/contentcreator/login','login');
    Route::get('/contentcreator/logout','logout');
});

Route::group(['middleware'=>'contentcreator'],function(){
    Route::get('/contentcreator/dashboard',[ContentcreatorController::class,'dashboard']);
    Route::get('/contentcreator/profile',[ContentcreatorController::class,'profile']);
    Route::post('/contentcreator/update_profile',[ContentcreatorController::class,'update_profile']);
    Route::post('/contentcreator/update_password',[ContentcreatorController::class,'update_password']);
    Route::get('/contentcreator/change-password',[ContentcreatorController::class,'change_password']);
    });

// Content Creator Routes End Here..........................................


// Backlink Manager Routes Start Here..........................................
Route::controller(BacklinkmanagerController::class)->group(function(){
    Route::get('/backlinkmanager','index2');
    Route::post('/backlinkmanager/login','login');
    Route::get('/backlinkmanager/logout','logout');
});

Route::group(['middleware'=>'backlinkmanager'],function(){
    Route::get('/backlinkmanager/dashboard',[BacklinkmanagerController::class,'dashboard']);
    Route::get('/backlinkmanager/profile',[BacklinkmanagerController::class,'profile']);
    Route::post('/backlinkmanager/update_profile',[BacklinkmanagerController::class,'update_profile']);
    Route::post('/backlinkmanager/update_password',[BacklinkmanagerController::class,'update_password']);
    Route::get('/backlinkmanager/change-password',[BacklinkmanagerController::class,'change_password']);

    Route::resource('/backlinkmanager/backlink', BacklinkController::class);
    });

// Backlink Manager Routes End Here..........................................
