<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransactionController;



Route::get('/', [CustomerController::class, 'dashboard'])->name('home');


Route::resource('customers', CustomerController::class);
Route::get('transactions/{customer}', [TransactionController::class, 'show'])->name('transactions.show');
Route::resource('transactions', TransactionController::class);
