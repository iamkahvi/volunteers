<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Slot;
use App\Models\Schedule;
use Illuminate\Console\Command;

class testDates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'testDates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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

        echo Carbon::createFromTime(12, 0, 0)."\n";

        echo Carbon::now().PHP_EOL;

        $currDate = date('Y-m-d');

        $dates = Schedule::where('dates', 'LIKE', '%'.$currDate.'%')->get()->first()->id;

        echo $dates.' versus '.$currDate.PHP_EOL;
    }
}
