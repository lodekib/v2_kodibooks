<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilityController;
use Illuminate\Support\Facades\Response;

Route::middleware('auth')->group(function () {
    Route::post('/utilities/update/{tenant}', [UtilityController::class, 'updateUtility'])->name('utilities.update');
});

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
    return Response::download('invoice_csv_template/invoice.csv', 'invoice.csv', $headers);
})->name('template.invoice');
Route::get('manager/tenants/sample-csv-download', function () {
    $headers = array('Content-Type' => 'text/csv');
    return Response::download('tenant_csv_template/tenant.csv', 'tenant.csv', $headers);
})->name('template.tenant');
Route::get('manager/properties/sample-csv-download', function () {
    $headers = array('Content-Type' => 'text/csv');
    return Response::download('property_csv_template/property.csv', 'property.csv', $headers);
})->name('template.property');
