<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     => 'Haviz Indra Maulana',
            'email'    => 'viz.ndinq@gmail.com',
            'phone'    => '085159911092',
            'gender'   => 'Laki-laki',
            'password' => Hash::make('loopsid123')
        ]);
    }
}
