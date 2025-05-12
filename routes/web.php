<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\user\AuthController;
use App\Http\Controllers\user\HomeController;

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



Route::controller(HomeController::class)->group(function(){
  Route::get('/',  'index')->name('HomePage');
  Route::get('/service', 'service')->name('servicePage');
  Route::get('/services', 'services')->name('servicesPage');
});



Route::controller(AuthController::class)->group(function(){
  Route::get('/signup', 'signup')->name('signupPage');
  Route::get('login', 'login')->name('loginPage');
});


