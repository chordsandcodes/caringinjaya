<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProducerController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/admin/login', [LoginController::class, 'admin'])->name('admin.login');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

// distributor
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('orders/create', [OrderController::class, 'create'])->name('order.create');
Route::post('orders/store', [OrderController::class, 'store'])->name("order.store");
Route::get('orders/{id}/edit', [OrderController::class, 'edit'])->name('order.edit');
Route::delete('orders/{id}/destroy', [OrderController::class, 'destroy'])->name('order.destroy');
Route::put('orders/{id}/update', [OrderController::class, 'update'])->name('order.update');

// producer
Route::get('/orders/incoming', [OrderController::class, 'incoming'])->name('orders.incoming.index');
Route::get('/order/{id}/accept', [OrderController::class, 'accept'])->name('order.accept');

Route::get('/producers', [ProducerController::class, 'index'])->name('producers');
Route::get('producers/create', [ProducerController::class, 'create'])->name('producer.create');
Route::post('producers/store', [ProducerController::class, 'store'])->name("producer.store");
Route::get('producers/{id}/edit', [ProducerController::class, 'edit'])->name('producer.edit');
Route::delete('producers/{id}/destroy', [ProducerController::class, 'destroy'])->name('producer.destroy');
Route::put('producers/{id}/update', [ProducerController::class, 'update'])->name('producer.update');

Route::get('/distributors', [DistributorController::class, 'index'])->name('distributors');
Route::get('distributors/create', [DistributorController::class, 'create'])->name('distributor.create');
Route::post('distributors/store', [DistributorController::class, 'store'])->name("distributor.store");
Route::get('distributors/{id}/edit', [DistributorController::class, 'edit'])->name('distributor.edit');
Route::delete('distributors/{id}/destroy', [DistributorController::class, 'destroy'])->name('distributor.destroy');
Route::put('distributors/{id}/update', [DistributorController::class, 'update'])->name('distributor.update');

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('products/create', [ProductController::class, 'create'])->name('product.create');
Route::post('products/store', [ProductController::class, 'store'])->name("product.store");
Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::delete('products/{id}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');
Route::put('products/{id}/update', [ProductController::class, 'update'])->name('product.update');