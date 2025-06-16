<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ServiceFieldController;

  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Route;

  Route::get('/', [DashboardController::class, 'index'])->name('admin.index');

  Route::controller(ServiceController::class)->prefix('service')->group(function(){
    Route::get('/', 'index')->name('admin.service.view');
    Route::get('add', 'add')->name('admin.service.add');
    Route::get('edit/{service}', 'Edit')->name('admin.service.Edit');
    Route::post('/post-service', 'save')->name('admin.service.insertData');
    Route::post('/post-Editservice/{service}', 'postEdit')->name('admin.service.PostEdit');
    Route::get('addCategory', 'addCategory')->name('admin.service.AddCategory');
    Route::get('editCategory/{cat}', 'editCategory')->name('admin.service.editCategory');
    Route::post('addCategory', 'postaddCategory')->name('admin.service.postAddCategory');
    Route::post('editCategory/{cat}', 'posteditCategory')->name('admin.service.postEditCategory');
    Route::get('viewCategory', 'viewCategory')->name('admin.service.viewCategory');
    Route::post('deletecategory', 'deleteCateogy')->name('admin.services.deleteCategory');
    Route::post('delete', 'delete')->name('admin.services.delete');
  });


  Route::controller(ServiceFieldController::class)->group(function(){
    Route::get('/addField/{service}', 'create')->name('admin.service.AddField');
    Route::post('store/{service}', 'store')->name('admin.service.addFieldPost');
    Route::get('edit/{service}', 'edit')->name('admin.service.editFieldPost');
    Route::put('update/{service}', 'update')->name('admin.service.updateFieldPost');
  });

  Route::controller(AuthController::class)->group(function(){
    Route::get('login', 'login')->name('admin.login');
    Route::post('login', 'Login_post')->name('admin.login.post');
  });


  Route::controller(UserController::class)->prefix('users')->group(function(){
    Route::get('/add', 'add')->name('admin.user.add');
    Route::post('/add', 'postuser')->name('admin.user.postadd');
    Route::get('/view', 'view')->name('admin.users.view');
    Route::get('edit/{user}', 'edit')->name('admin.users.edit');
    Route::post('editpost/{user}', 'editpost')->name('admin.users.postEdit');
    Route::post('delete', 'delete')->name('admin.users.delete');
  });
