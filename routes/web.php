<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilityController;



Route::middleware('auth')->group(function () {
    Route::post('/utilities/update/{tenant}', [UtilityController::class, 'updateUtility'])->name('utilities.update');
});
