<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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

Route::get('/', [PageController::class,'home'])->name('home');

Route::get('/cart', [PageController::class,'cart'])->name('cart');

//Auth
Route::get('/login', [AuthController::class,'showLogin'])->name('login')->middleware('guest');

Route::get('/register', [AuthController::class,'showRegister'])->name('register')->middleware('guest');

Route::post('/register', [AuthController::class,'postRegister'])->name('register')->middleware('guest');

Route::post('/login', [AuthController::class,'postLogin'])->name('login')->middleware('guest');

Route::post('/logout', [AuthController::class,'logout'])->name('logout')->middleware('auth');

//Admin Panel
Route::get('/adminpanel', [AdminController::class,'dashboard'])->name('dashboard')->middleware('admin');

