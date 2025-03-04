<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;

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

// Route::get('/admin/service', function () {
//     return view('welcome');
// });


Route::get('/', [ServiceController::class, 'index']);
Route::post('/post', [ServiceController::class, 'store'])->name('post_service');
