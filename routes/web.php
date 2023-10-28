<?php

use App\Http\Controllers\MpesaC2BController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilityController;
use Illuminate\Support\Facades\Response;

Route::middleware('auth')->group(function () {
    Route::post('/utilities/update/{tenant}', [UtilityController::class, 'updateUtility'])->name('utilities.update');
});

Route::post('register-urls', [MpesaC2BController::class, 'registerURLS']);
Route::post('validation',[MpesaC2BController::class,'validation'])->name('c2b.validate');
Route::post('confirmation',[MpesaC2BController::class,'confirmation'])->name('c2b.confirm');

Route::get('manager/units/sample-csv-download', function () {
    $headers = array('Content-Type' => 'text/csv');
    return Response::download('units_csv_template/unit.csv', 'unit.csv', $headers);
})->name('template.unit');
Route::get('manager/payments/sample-csv-download', function () {
    $headers =  array('Content-Type' => 'text/csv');
    return Response::download('payments_csv_template/payment.csv', 'payment.csv', $headers);
})->name('template.payment');
Route::get('manager/invoices/sample-csv-download', function () {
    $headers =  array('Content-Type' => 'text/csv');
    return Response::download('invoices_csv_template/invoice.csv', 'invoice.csv', $headers);
})->name('template.invoice');
Route::get('manager/tenants/sample-csv-download', function () {
    $headers = array('Content-Type' => 'text/csv');
    return Response::download('tenants_csv_template/tenant.csv', 'tenant.csv', $headers);
})->name('template.tenant');
Route::get('manager/properties/sample-csv-download', function () {
    $headers = array('Content-Type' => 'text/csv');
    return Response::download('properties_csv_template/property.csv', 'property.csv', $headers);
})->name('template.property');
