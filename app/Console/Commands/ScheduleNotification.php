<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\ReminderNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ScheduleNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Schedule Notification Command';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = ReminderNotification::where('schedule_time',Carbon::now()->format('Y-m-d h:i:00'))->get();
        // dd($data);
        $email = 'sharad@mailinator.com';

        foreach($data as $val) {
            if(isset($email) && $email != '') {
                    \Mail::to($email)->send(new \App\Mail\SendNotification($val));
            }
        }
    }
}
