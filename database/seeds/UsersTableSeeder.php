<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([

            'name' => 'Admin',
            'email' => 'admin001@test.com',
            'password' => bcrypt('password'),
            'usertype' =>'Admin',

        ]);
    }
}
