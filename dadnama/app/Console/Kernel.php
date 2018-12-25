<?php

namespace App\Console;

use App\Console\Commands\CreateModels;
use App\Console\Commands\CreateMutation;
use App\Console\Commands\CreatePackages;
use App\Console\Commands\CreateQearye;
use App\Console\Commands\CreateTypes;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        CreatePackages::class,
        CreateTypes::class,
        CreateModels::class,
        CreateQearye::class,
        CreateMutation::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
