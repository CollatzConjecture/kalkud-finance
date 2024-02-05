<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UnitController;
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

Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/unit', UnitController::class);

Route::resource('/product-type', ProductTypeController::class);

Route::resource('/product', ProductTypeController::class);

