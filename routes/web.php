<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;


// Route::get('/',AppController::class,'index');
Route::get('/',[AppController::class, 'index'])->name('dashboard');
Route::resource('accounts', AccountController::class);
Route::resource('transactions', TransactionController::class);
