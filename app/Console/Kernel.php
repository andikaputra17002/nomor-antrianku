<?php

namespace App\Console;

use App\Models\pendaftaran;
use App\Models\Riwayat;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            $pendaftaran = pendaftaran::where('tanggal_pendaftaran', now()->toDateTimeString('Y-m-d'))->get();
            foreach ($pendaftaran as $item){
                unset($item['id']);
                $item['status'] = false;
                Riwayat::create($item);
            }
        })->dailyAt('23:59');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
