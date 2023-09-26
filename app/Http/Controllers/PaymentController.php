<?php

namespace App\Http\Controllers;

use App\Http\Resources\PaymentCollection;
use App\Models\Payment;
use App\Models\Scopes\ManagerScope;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        return new PaymentCollection(Payment::withoutGlobalScope(ManagerScope::class)->get());
    }
}
