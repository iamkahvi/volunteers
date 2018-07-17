<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Slot;
use App\Models\User;
use App\Models\UserRole;
use App\Models\Event;
use App\Notifications\EventCreated;
use App\Notifications\shiftStarting;
use Carbon\Carbon;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Notification\Notifications;


class remindUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:remind';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command runs through the slots table to determine which shifts are happening within the hour.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
     public function handle()
     {

         $currDate = date("Y-m-d H:i:s");

         $shifts = Slot::get();

         // Cycle through all the slots
         foreach($shifts as $shift)
         {

             // Find all the shifts that start today
             if($shift->start_date == date('Y-m-d'))
             {

                 // Find all the shifts that start within the next hour
                 if(date('H:i:s', strtotime($shift->start_time) - 3600) <= date('H:i:s') and $shift->start_time > date('H:i:s'))
                 {
                     echo date('H:i:s', strtotime($shift->start_time) - 3600).' is less than or equal to '.date('H:i:s').PHP_EOL;

                     echo $shift->start_time.' is greater than '.date('H:i:s').PHP_EOL;

                     // Find all the shifts that are empty
                     if(empty($shift->user_id))
                     {
                         echo 'No one has signed up for it, so you should send reminders to the admins'.PHP_EOL;

                         // Find all admin users
                         $admins = UserRole::get()->where('role_id', 1);

                         if($shift->isNotified == 'No')
                         {

                             // Find all admin users
                             foreach ($admins as $admin)
                             {
                                 $user = User::get()->where('id', $admin->user_id)->first();

                                 $user->notify(new shiftStarting($shift, $user));
                             }

                         } else
                         {
                             echo "You already did lol".PHP_EOL;
                         }

                         // Updating Database isNotified value
                         DB::table('slots')
                                     ->where('id', $shift->id)
                                     ->update(['isNotified' => 'Yes']);

                        /*
                         // Notify admin of unregistered shift
                         if($shift->isNotified == 'No')
                         {
                             $admin->notify(new shiftStarting($shift, $admin));
                         } else
                         {
                             echo "You already did lol".PHP_EOL;
                         }
                         */

                     }

                     // Find all the shifts that are full
                     else
                     {
                         echo $shift->getDepartmentAttribute()->description.PHP_EOL;

                         $users = User::get();

                         // Cycle through users
                         foreach ($users as $user)
                         {

                             // Find user that is registered for this shift
                             if ($user->id == $shift->user_id) {

                                 echo 'You should remind '.$user->email.' that they have a shift starting soon'.PHP_EOL;

                                 // Updating Database isNotified value
                                 DB::table('slots')
                                             ->where('id', $shift->id)
                                             ->update(['isNotified' => 'Yes']);

                                 // Notify user of upcoming shift
                                 if($shift->isNotified == 'No')
                                 {
                                     $user->notify(new shiftStarting($shift, $user));
                                 } else
                                 {
                                     echo "You already did lol".PHP_EOL;
                                 }

                             }
                         }

                     }
                 }
                 else
                 {
                     echo 'Shift does not start within the hour'.PHP_EOL;
                 }
             }
             else
             {
                 echo 'No shifts begin today'.PHP_EOL;
             }

         }

     }

 }