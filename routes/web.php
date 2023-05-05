<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MenController;
use App\Http\Controllers\ProductController as ControllersProductController;
use App\Http\Controllers\TransactionController as ControllersTransactionController;
use App\Http\Controllers\WomanController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $products = Product::get();
    return view('welcome', compact('products'));
});

Route::get('/check', function(){
    return Auth::user()->role == 'admin' ? redirect('/home') : redirect('/');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('category', CategoryController::class);
Route::resource('product', ProductController::class);
Route::resource('cart', CartController::class);
Route::resource('transaction', ControllersTransactionController::class);
Route::resource('pemesanan', TransactionController::class);
Route::resource('user', UserController::class);
Route::resource('produk', ControllersProductController::class);
Route::post('/cart/delete/api', [CartController::class, 'deleteApi']);
Route::resource('men', MenController::class);
Route::resource('woman', WomanController::class);
