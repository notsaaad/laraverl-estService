<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\ServiceController;

  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Route;


  Route::controller(ServiceController::class)->prefix('service')->group(function(){
    Route::get('add', 'add')->name('admin.service.add');
    Route::post('/post-service', 'save')->name('admin.service.insertData');
  });


  Route::controller(AuthController::class)->group(function(){
    Route::get('login', 'login')->name('admin.login');
    Route::post('login', 'Login_post')->name('admin.login.post');
  });
