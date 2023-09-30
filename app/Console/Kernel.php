<?php

namespace App\Console;

use App\Jobs\GarbageInvoice;
use App\Jobs\RentInvoice;
use App\Jobs\WaterInvoice;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->job(new RentInvoice())->everyMinute();
        // $schedule->job(new GarbageInvoice())->monthlyOn(28,'00:00');
        // $schedule->job(new WaterInvoice())->monthlyOn(28,'00:00');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
