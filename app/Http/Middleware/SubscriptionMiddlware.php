<?php

namespace App\Http\Middleware;

use App\Models\MpesaC2B;
use Bpuig\Subby\Models\PlanSubscription;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SubscriptionMiddlware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $total_payments = MpesaC2B::where('Account_Number', Auth::user()->national_id)->sum('Amount');
        //TODO::USE CREATED_AT
        $total_subscriptions  = PlanSubscription::where('subscriber_id', Auth::id())->sum('price');
        if ($total_payments < $total_subscriptions) {
            return redirect('/pay-page');
        }
        return $next($request);
    }
}
