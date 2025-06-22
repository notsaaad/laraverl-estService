<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\ServiceController;
use App\Http\Controllers\api\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/





Route::controller(AuthController::class)->group(function(){
  Route::post('/login',  'login');
  Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile',  'profile');
    Route::post('/logout',  'logout');
  });
});



Route::controller(CategoryController::class)->prefix('categories')->group(function(){
  Route::get('/', 'index');
  Route::get('{id}/services', 'services');
});

Route::controller(ServiceController::class)->prefix('services')->group(function(){
  Route::get('/', 'index');
  Route::get('/{id}', 'single');
  Route::get('search', 'search');
});


Route::controller(OrderController::class)->group(function(){
  Route::post('/orders', 'store');
});
