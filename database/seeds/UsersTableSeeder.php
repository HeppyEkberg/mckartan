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
            'name' => 'Heppy',
            'email' => 'tehheppy@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'name' => 'Robin',
            'email' => 'robinpkarlsson@gmail.com',
            'password' => bcrypt('secret'),
        ]);

    }
}
