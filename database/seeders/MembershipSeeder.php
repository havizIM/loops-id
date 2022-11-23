<?php

namespace Database\Seeders;

use App\Models\Membership;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'              => 'Paket Basic',
                'duration_in_month' => 1,
                'price'             => 50000
            ],
            [
                'name'              => 'Paket Middle',
                'duration_in_month' => 3,
                'price'             => 130000
            ],
            [
                'name'              => 'Paket Advance',
                'duration_in_month' => 6,
                'price'             => 250000
            ]
        ];

        foreach($data as $val) {
            Membership::create($val);
        }
    }
}
