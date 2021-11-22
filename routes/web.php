<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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
//     return view('guest.main-home');
// });

Auth::routes();

// guest or accessible to anyone
Route::get('/', [GuestController::class, 'index'])->name('home');
Route::get('/profile', [GuestController::class, 'profile']);
Route::get('/products', [GuestController::class, 'products']);
// Route::get('/', [App\Http\Controllers\GuestController::class, 'index'])->name('home');
// Route::get('/profile', [App\Http\Controllers\GuestController::class, 'profile']);
// Route::get('/products', [App\Http\Controllers\GuestController::class, 'products']);



// admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
    Route::get('/admin/order_list', [AdminController::class, 'order_list']);
    Route::get('/admin/produk', [AdminController::class, 'product']);
    Route::get('/admin/profile', [AdminController::class, 'profile']);
    Route::get('/admin/history', [AdminController::class, 'history']);
    Route::get('/admin/detail_produk', [AdminController::class, 'single_product']);
    // Route::post('/admin/hapus_produk', [AdminController::class, 'destroy']);
    Route::get('/admin/{id}/delete', [AdminController::class, 'delete']);
    Route::post('/admin/{id}/update_produk', [AdminController::class, 'update']);
    Route::get('/admin/tambah_produk', [AdminController::class, 'add_product_page']);
    Route::post('/admin/add', [AdminController::class, 'create']);
});
// Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->middleware('role:admin');
// Route::get('/admin/order_list', [App\Http\Controllers\AdminController::class, 'order_list'])->middleware('role:admin');
// Route::get('/admin/produk', [App\Http\Controllers\AdminController::class, 'product'])->middleware('role:admin');
// Route::get('/admin/profile', [App\Http\Controllers\AdminController::class, 'profile'])->middleware('role:admin');
// Route::get('/admin/history', [App\Http\Controllers\AdminController::class, 'history'])->middleware('role:admin');
// Route::get('/admin/detail_produk', [App\Http\Controllers\AdminController::class, 'single_product'])->middleware('role:admin');
// Route::post('/admin/hapus_produk', [App\Http\Controllers\AdminController::class, 'destroy'])->middleware('role:admin');
// Route::post('/admin/update_produk', [App\Http\Controllers\AdminController::class, 'update'])->middleware('role:admin');
// Route::get('/admin/tambah_produk', [App\Http\Controllers\AdminController::class, 'add_product_page'])->middleware('role:admin');
// Route::post('/admin/store', [App\Http\Controllers\AdminController::class, 'store'])->middleware('role:admin');


// user
Route::get('/user/dashboard', [App\Http\Controllers\UserController::class, 'index'])->middleware('role:user');
Route::get('/user/showprofile', [App\Http\Controllers\UserController::class, 'showprofile'])->middleware('role:user');
Route::get('/user/cart', [App\Http\Controllers\UserController::class, 'showCart'])->middleware('role:user');
Route::post('/user/addcart', [App\Http\Controllers\UserController::class, 'addCart'])->middleware('role:user');
Route::get('/user/checkout', [App\Http\Controllers\UserController::class, 'showCheckout'])->middleware('role:user');
