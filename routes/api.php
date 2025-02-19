<?php
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\TransactionController;

Route::post('customers', [CustomerController::class, 'createCustomer']);
Route::post('login', [CustomerController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('transactions/credit', [TransactionController::class, 'credit']);
    Route::post('transactions/debit', [TransactionController::class, 'debit']);
    Route::post('logout', [CustomerController::class, 'logout']);
});
