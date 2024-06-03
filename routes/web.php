<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KeranjangController;


Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//Route::get('/register', [LoginController::class, 'register'])->name('register');
//Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register-proses');

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () { 

    //Route::get('/dashboard', [BarangController::class, 'card'])->name('dashboard');
    //Route::get('/dashboard', [BarangController::class, 'card'])->name('dashboard');
    // web.php
    //Route::get('/dashboard', [BarangController::class, 'card'])->name('admin.dashboard');
    Route::get('/dashboard', [BarangController::class, 'card'])->name('dashboard');


    
    //Untuk Tabel User
    Route::get('/user', [HomeController::class, 'index'])->name('user.index');
    Route::get('/user/create', [HomeController::class, 'create'])->name('user.create');
    Route::post('/user/store', [HomeController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [HomeController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{id}', [HomeController::class, 'update'])->name('user.update');
    Route::delete('/user/delete/{id}', [HomeController::class, 'delete'])->name('user.delete');
    
    //Untuk Tabel Customer
    Route::get('/customer', [CustomerController::class, 'tampilcus'])->name('cus.index');
    Route::get('/customer/create', [CustomerController::class, 'create'])->name('cus.create');
    Route::post('/customer/store', [CustomerController::class, 'store'])->name('cus.store');
    Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->name('cus.edit');
    Route::put('/customer/update/{id}', [CustomerController::class, 'update'])->name('cus.update');
    Route::delete('/customer/delete/{id}', [CustomerController::class, 'delete'])->name('cus.delete');

    //Untuk Tabel Barang
    Route::get('/barang', [BarangController::class, 'tampilbar'])->name('bar.index');
    Route::get('/barang/create', [BarangController::class, 'create'])->name('bar.create');
    Route::post('/barang/store', [BarangController::class, 'store'])->name('bar.store');
    Route::get('/barang/edit/{id}', [BarangController::class, 'edit'])->name('bar.edit');
    Route::put('/barang/update/{id}', [BarangController::class, 'update'])->name('bar.update');
    Route::delete('/barang/delete/{id}', [BarangController::class, 'delete'])->name('bar.delete');

    
});