<?php

namespace App\Console;

use App\Jobs\GarbageInvoice;
use App\Jobs\RentInvoice;
use App\Jobs\WaterInvoice;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Auth;
use \Bpuig\Subby\Jobs\SubscriptionPaymentQueuerJob;

class Kernel extends ConsoleKernel
{


    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->job(new RentInvoice())->lastDayOfMonth();
        $schedule->job(new GarbageInvoice())->lastDayOfMonth();
        $schedule->job(new WaterInvoice())->lastDayOfMonth();
        $schedule->job(new SubscriptionPaymentQueuerJob())->everyFiveMinutes();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
