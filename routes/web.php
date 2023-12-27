<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\validator;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DashboardController;



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

Route::get('/', function () {


    return view('auth.login');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard'); 

    // route data produk
    Route::get('/products', [ProductController::class, 'index'])->name('products.index')->middleware('auth');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    // route distributor
    Route::get('/distributors', [DistributorController::class, 'index'])->name('distributors.index')->middleware('auth');
    Route::get('/distributors/create', [DistributorController::class, 'create'])->name('distributors.create');
    Route::post('/distributors', [DistributorController::class, 'store'])->name('distributors.store');
    Route::get('/distributors/{distributor}', [DistributorController::class, 'show'])->name('distributors.show');
    Route::get('/distributors/{distributor}/edit', [DistributorController::class, 'edit'])->name('distributors.edit');
    Route::put('/distributors/{distributor}', [DistributorController::class, 'update'])->name('distributors.update');
    Route::delete('/distributors/{distributor}', [DistributorController::class, 'destroy'])->name('distributors.destroy');

    // route user
    Route::get('/users', [HomeController::class, 'index'])->name('users.index');
    Route::get('/create', [HomeController::class, 'create'])->name('users.create');
    Route::post('/store', [HomeController::class, 'store'])->name('users.store');
    Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('users.edit');
    Route::put('/update/{id}', [HomeController::class, 'update'])->name('users.update');
    Route::delete('/delete/{id}', [HomeController::class, 'delete'])->name('users.delete');

    
    Route::get('/pegawais', [PegawaiController::class, 'index'])->name('pegawais.index')->middleware('auth');
    Route::get('/pegawais/create', [PegawaiController::class, 'create'])->name('pegawais.create');
    Route::post('/pegawais', [PegawaiController::class, 'store'])->name('pegawais.store');
    Route::get('/pegawais/{pegawai}', [PegawaiController::class, 'show'])->name('pegawais.show');
    Route::get('/pegawais/{pegawai}/edit', [PegawaiController::class, 'edit'])->name('pegawais.edit');
    Route::put('/pegawais/{pegawai}', [PegawaiController::class, 'update'])->name('pegawais.update');
    Route::delete('/pegawais/{pegawai}', [PegawaiController::class, 'destroy'])->name('pegawais.destroy');

});



Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login_proses', [LoginController::class, 'login_proses'])->name('login_proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register_proses', [LoginController::class, 'register_proses'])->name('register_proses');
