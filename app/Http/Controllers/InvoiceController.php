<?php

namespace App\Http\Controllers;

use App\Http\Resources\InvoiceCollection;
use App\Http\Resources\InvoiceResource;
use App\Models\Invoice;
use App\Models\Scopes\ManagerScope;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        return new InvoiceCollection(Invoice::withoutGlobalScope(ManagerScope::class)->get());
    }   
}
