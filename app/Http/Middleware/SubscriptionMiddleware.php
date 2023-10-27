<?php

namespace App\Http\Middleware;

use App\Mail\ClientInvoiced;
use App\Models\Mail;
use App\Models\Manager;
use App\Services\InvoiceClient;
use Closure;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;
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
        if(auth()->check()){
            $manager = Manager::find(auth()->id());
            if (!$manager->paid_subscription) {
                if (!$manager->is_invoiced) {
                    $mail_config = Mail::where('manager_id', auth()->id());
                    $get_mail_config = Mail::find($mail_config->first()->id);
                    $get_mail_config->mailer()->to($manager->org_email)->send(new ClientInvoiced());
                    if ($manager->update(['is_invoiced' => true])) {
                        Notification::make()->success()->color('success')->body('Check your email for the pending invoice and make the 
                    subscription payment')->seconds(4)->send();
                    }
                }
                return redirect('pay-page');
            }
        }
        return $next($request);
    }
}
