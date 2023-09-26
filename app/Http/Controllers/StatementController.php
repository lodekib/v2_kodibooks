<?php

namespace App\Http\Controllers;

use App\Http\Resources\StatementCollection;
use App\Models\Scopes\ManagerScope;
use App\Models\Statement;
use Illuminate\Http\Request;

class StatementController extends Controller
{
    public function index(Request $request)
    {
        return new StatementCollection(Statement::withoutGlobalScope(ManagerScope::class)->get());
    }
}
