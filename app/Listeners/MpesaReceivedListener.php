<?php

namespace App\Listeners;

use App\Events\MpesaReceived;
use App\Models\MpesaC2B;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MpesaReceivedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(MpesaC2B $event): void
    {
        
         redirect()->route('filament.manager.pages.manager-dashboard');
    }
}
