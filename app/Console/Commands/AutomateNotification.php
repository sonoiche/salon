<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\NotificationMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AutomateNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'automate:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will automatically checks subscriptions and send notifications when subscription is nearly ending.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $from   = Carbon::now();
        $to     = Carbon::now()->addDays(5);
        $users  = User::where('subscription', true)->where('status', 'Active')->whereBetween(DB::raw("date(subscribe_until)"), [$from, $to])->get();

        foreach ($users as $user) {
            $subscription_date = Carbon::parse($user->subscribe_until)->format('F d, Y');
            $message = "We hope you’ve been enjoying ".config('app.name')."! This is a friendly reminder that your subscription is set to expire on ".$subscription_date.". To continue enjoying uninterrupted access to ".config('app.name').", we recommend renewing your subscription before it ends.";
            $content = ['message' => $message];
            Mail::to($user->email)->send(new NotificationMail($user, $content));
        }
    }
}
