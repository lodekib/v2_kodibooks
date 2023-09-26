<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StatementController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('invoices', InvoiceController::class)->only(['index']);
Route::apiResource('payments', PaymentController::class)->only(['index']);
Route::apiResource('statements', StatementController::class)->only(['index']);
