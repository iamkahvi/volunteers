<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands =
    [
        \App\Console\Commands\PopulateScheduleDates::class,
        \App\Console\Commands\FixDuplicateRoles::class,
        \App\Console\Commands\Inspire::class,
        \App\Console\Commands\remindUsers::class,
        \App\Console\Commands\sendEmail::class,
        \App\Console\Commands\testDates::class,


    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//        $schedule->command('inspire')->hourly();

        // php artisan user:remind
        $schedule->command('user:remind')->everyFiveMinutes();

    }
}
