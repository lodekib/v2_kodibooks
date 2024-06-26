<?php

use App\Http\Controllers\MpesaB2CController;
use App\Http\Controllers\MpesaC2BController;
use App\Http\Controllers\MpesaSTKController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilityController;
use App\Http\Middleware\ManagerIDMiddleware;
use App\Livewire\ApprovalComponent;
use App\Models\Manager;
use App\Models\User;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth')->group(function () {
    Route::post('/utilities/update/{tenant}', [UtilityController::class, 'updateUtility'])->name('utilities.update');
});


Route::post('register-urls', [MpesaC2BController::class, 'registerURLS']);
Route::post('validation', [MpesaC2BController::class, 'validation'])->name('c2b.validate');
Route::post('confirmation', [MpesaC2BController::class, 'confirmation'])->name('c2b.confirm')->middleware(ManagerIDMiddleware::class);
Route::post('results', [MpesaB2CController::class, 'b2c_result'])->name('b2c.result');

Route::post('/v1/mpesatest/stk/push', [MpesaSTKController::class, 'STKPush']);

Route::get('manager/units/sample-csv-download', function () {
    $headers = array(
        'Content-Type' => 'text/csv',
    );
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
Route::get('manager/ttemplate/sample-csv-download', function () {
    $headers = array('Content-Type' => 'text/csv');
    return Response::download('tenants_csv_template/tenant.csv', 'tenant.csv', $headers);
})->name('template.tenant');
Route::get('manager/ptemplate/sample-csv-download', function () {
    $headers = array('Content-Type' => 'text/csv');
    return Response::download('properties_csv_template/property.csv', 'property.csv', $headers);
})->name('template.property');

Route::get('/delete/account', function () {
    $manager = Manager::find(auth()->id());
    $user = User::find(auth()->id());
    if ($manager->delete()) {
        $user->delete();
        Notification::make()->success()->color('success')->title('Success')->body('Account deleted successfully .')->send();
    }
    auth()->logout();
    return redirect(route('filament.manager.auth.register'));
});
