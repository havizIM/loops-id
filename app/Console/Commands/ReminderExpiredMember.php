<?php

namespace App\Console\Commands;

use App\Models\UserMembership;
use Illuminate\Console\Command;
use App\Notifications\ReminderExpired;

class ReminderExpiredMember extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expired:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending Email Reminder for Expired Member';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $memberExpiredIn7Days = UserMembership::with([
            'user'
        ])->whereRaw(
            'datediff(expired_at, NOW()) = 7'
        )->where(
            'status',
            'Active'
        )->get();

        foreach ($memberExpiredIn7Days as $member) {
            $member->user->notify(new ReminderExpired($member));
        }
        
        return Command::SUCCESS;
    }
}
