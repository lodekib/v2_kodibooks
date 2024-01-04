<?php

namespace App\Http\Middleware;

use App\Mail\ClientInvoiced;
use App\Models\Mail;
use App\Models\Manager;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Closure;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class SubscriptionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (auth()->check()) {
            session(['manager_id'=> auth()->id()]);
            $manager = Manager::find(auth()->id());
            if ($manager != null && !$manager->paid_subscription) {
                Cache::put('id_manager', $manager->national_id);
                if (!$manager->is_invoiced) {
                    FacadesMail::to($manager->org_email)->send(new ClientInvoiced($manager));
                    if ($manager->update(['is_invoiced' => true])) {
                        Notification::make()->success()->color('success')->body('Check your email for the pending invoice and make the 
                    subscription payment')->seconds(4)->send();
                    }
                }
                return redirect('/manager/pay-page');
            }
        }
        return $next($request);
    }
}
