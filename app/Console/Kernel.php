<?php

namespace App\Console;

use App\Models\Letter;
use Illuminate\Console\Scheduling\Schedule;
// use App\Http\Controllers\Letter\LetterMovementController;
use App\Console\Commands\UpdateLetterStatusCommand;
use App\Console\Commands\delayLetterWarning;
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
//        $schedule->call(function () {
//     $controller = new LetterMovementController();
//     $controller->delayLetterWarning();
// })->everyMinute()->name('delayLetterWarningTask');

$schedule->command('letters:update-status')->everyMinute();
$schedule->command('letters:delay-alert')->everyMinute();
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
