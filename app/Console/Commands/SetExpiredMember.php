<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\UserMembership;
use Illuminate\Console\Command;
use App\Notifications\ReminderExpired;
use Illuminate\Support\Facades\Notification;

class SetExpiredMember extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expired:membership';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set Expired Membership';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        UserMembership::whereDate('expired_date', '>=', date('Y-m-d'))->update([
            'status' => 'Expired'
        ]);

        return Command::SUCCESS;
    }
}
