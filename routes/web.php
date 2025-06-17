<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\user\AuthController;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\OrderController;
use App\Http\Controllers\user\othersController;
use App\Http\Controllers\user\CategoryController;

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
  Route::get('/service/{service}', 'service')->name('Single_Service');
  Route::get('/services', 'services')->name('servicesPage');
  Route::get('/services/search', 'search')->name('services.search');

});



  Route::controller(OrderController::class)->prefix('/orders')->group(function(){
    Route::get('/checkout/{service}',  'checkout')->name('CheckoutPage')->middleware('auth');
    Route::post('/checkout/store/{service}',  'store')->name('Checkout_StorePage');
    Route::get('/thankyou/{order}', 'thankyou')->name('ThankYouPage');
  });



Route::controller(AuthController::class)->group(function(){
  Route::get('/signup', 'signup')->name('signupPage');
  Route::get('login', 'login')->name('loginPage')->middleware('guest');
  Route::post('login', 'loginpost')->name('Login')->middleware('guest');
  Route::post('logout', 'logoutpost')->name('Logout');
  Route::get('account', 'account')->name('MyAccountPage')->middleware(['auth', 'dashboard']);


  // ===================================== Start Tech ==========================
    Route::prefix('tech')->group(function(){
      Route::get('account', 'Tech_my_account')->name('TechMyAccount')->middleware(['auth','dashboard']);
    });
  // ===================================== End Tech ============================
});


Route::controller(CategoryController::class)->group(function(){
  Route::get('/categoies', 'index')->name('CategoryPage');
  Route::get('/categoies/{cat}', 'CatPage')->name('SingleCategoryPage');
});


Route::controller(othersController::Class)->group(function(){
  Route::get('contact-us', 'contactUS')->name('contactUsPage');
  Route::get('About-us', 'AboutUs')->name('aboutUsPage');
});

