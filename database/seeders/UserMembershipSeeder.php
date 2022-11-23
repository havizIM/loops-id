<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Membership;
use App\Models\UserMembership;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserMembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserMembership::create([
            'user_id'        => 1,
            'membership_id'  => 1,
            'membership_log' => Membership::find(1),
            'status'         => 'Active',
            'activated_at'   => Carbon::now(),
            'expired_at'     => Carbon::now()->addMonth(1)
        ]);
    }
}
