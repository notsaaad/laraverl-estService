<?php

use App\Http\Controllers\admin\ServiceController;

  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Route;


  Route::controller(ServiceController::class)->prefix('service')->group(function(){
    Route::get('add', 'add')->name('admin.service.add');
    Route::post('/post-service', 'save')->name('admin.service.insertData');
  });
