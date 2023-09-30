<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\OrderController;

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

Route::get('/success', [PageController::class,'success'])->name('success');

Route::get('/', [PageController::class,'home'])->name('home');

Route::get('/cart', [PageController::class,'cart'])->name('cart');

Route::get('/wish-list', [PageController::class,'wishlist'])->name('wishlist');

Route::get('/account', [PageController::class,'account'])->name('account')->middleware('auth');

Route::get('/checkout', [pageController::class,'checkout'])->name('checkout')->middleware('auth');

Route::get('/products/{id}', [PageController::class,'product'])->name('product');

Route::post('/stripe-checkout', [checkoutController::class,'stripeCheckout'])->name('stripeCheckout')->middleware('auth');

//cart
Route::post('/add-to-cart/{id}', [CartController::class,'addToCart'])->name('addToCart');

Route::post('/remove-from-cart/{id}', [CartController::class,'removeFromCart'])->name('removeFromCart');

//Auth
Route::get('/login', [AuthController::class,'showLogin'])->name('login')->middleware('guest');

Route::get('/register', [AuthController::class,'showRegister'])->name('register')->middleware('guest');

Route::post('/register', [AuthController::class,'postRegister'])->name('register')->middleware('guest');

Route::post('/login', [AuthController::class,'postLogin'])->name('login')->middleware('guest');

Route::post('/logout', [AuthController::class,'logout'])->name('logout')->middleware('auth');

//Admin Panel routes
Route::group(['prefix' => 'adminpanel', 'middleware' => 'admin'], function(){

    Route::get('/', [AdminController::class,'dashboard'])->name('adminpanel');
    

    //products
    Route::group(['prefix' => 'products'], function(){
    Route::get('/', [ProductController::class, 'index'])->name('adminpanel.products');
    Route::get('/create', [ProductController::class, 'create'])->name('adminpanel.products.create');
    Route::post('/create', [ProductController::class, 'store'])->name('adminpanel.products.store');
    Route::get('/{id}', [ProductController::class, 'edit'])->name('adminpanel.products.edit');
    Route::put('/{id}', [ProductController::class, 'update'])->name('adminpanel.products.edit');
    Route::delete('/{id}', [ProductController::class, 'destroy'])->name('adminpanel.products.destroy');
});

    //categories
    Route::group(['prefix' => 'categories'], function(){
        Route::get('/', [CategoryController::class, 'index'])->name('adminpanel.categories');
        Route::post('/', [CategoryController::class, 'store'])->name('adminpanel.category.store');
        Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('adminpanel.category.destroy');

    });

    //colors
    Route::group(['prefix' => 'colors'], function(){
        Route::get('/', [ColorController::class, 'index'])->name('adminpanel.colors');
        Route::post('/', [ColorController::class, 'store'])->name('adminpanel.colors.store');
        Route::delete('/{id}', [ColorController::class, 'destroy'])->name('adminpanel.colors.destroy');

    });

    //orders
    Route::group(['prefix' => 'orders'], function(){
        Route::get('/', [OrderController::class, 'index'])->name('adminpanel.orders');
        Route::get('/{id}', [OrderController::class, 'view'])->name('adminpanel.orders.view');
        Route::post('/{id}', [OrderController::class, 'updateStatus'])->name('adminpanel.orders.status.update');
    });
});

