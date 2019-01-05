<?php

namespace App\Console;

use App\Jobs\SendCampaignJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $campaigns = DB::table('campaigns')
                ->where([
                    ['status', '=', 'Scheduled'],
                    ['schedule_date', '<=', date("Y-m-d G:i:s")],
                ])
                ->select('id')
                ->orderBy('schedule_date')
                ->get();

            foreach ($campaigns as $campaign) {
                SendCampaignJob::dispatch($campaign->id)
                    ->onConnection('sqs')
                    ->onQueue('MilanoCampaignQueue');

                DB::table('campaigns')
                    ->where('id', $campaign->id)
                    ->update(['status' => 'Sending']);
            }
        })->everyThirtyMinutes();
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
