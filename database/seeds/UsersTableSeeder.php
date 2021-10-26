<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Tharindu',
            'last_name' => 'Prabash',
            'date_of_birth' => '1990-01-01',
            'gender' => 'Male',
            'contact_number' => '01124567890',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789'),
        ]);
    }
}
