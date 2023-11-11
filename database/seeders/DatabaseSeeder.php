<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                'id' => '1',
                'name' => 'Admin',
                'middle' => 'Admin',
                'lastname' => 'Admin',
                'suffix' => 'Admin',
                'barangay' => 'Punta 1',
                'city_muni' => 'Tanza',
                'province' => 'Cavite',
                'dob' => 'Admin',
                'pobcity' => 'Tanza',
                'pobprovince' => 'Cavite',
                'age' => 'Admin',
                'civilstatus' => 'Admin',
                'citizenship' => 'Admin',
                'email' => 'admin@barangay.com',
                'email_verified_at' => Carbon::now(),
                'admin' => '1',
                'password' => bcrypt('qwerty123'),
        ]);
    }
}