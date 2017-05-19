<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

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
            'name' => 'oollhhaa',
            'firstname' => 'deveron',
            'lastname' => 'reniers',
            'email' => 'def-lol-lol@hotmail.com',
            'gender' => 'Man',
            'birthdate' => Carbon::createFromDate(1993, 2, 9),
            'status' => 'Online',
            'phonenumber' => '06 53779761',
            'api_token' => new Token(),
            'password' => bcrypt('admin'),
        ]);

        DB::table('users')->insert([
            'name' => 'oollhhaa2',
            'firstname' => 'test',
            'lastname' => 'test',
            'email' => 'deveron-test@hotmail.com',
            'gender' => 'vrouw',
            'birthdate' => Carbon::createFromDate(1993, 2, 9),
            'status' => 'Online',
            'phonenumber' => '06 54646468',
            'api_token' => new Token(),
            'password' => bcrypt('admin'),
        ]);

        DB::table('users')->insert([
            'name' => 'martijnjager',
            'firstname' => 'martijn',
            'lastname' => 'jager',
            'email' => 'martijnjager@live.nl',
            'gender' => 'man',
            'birthdate' => Carbon::createFromDate(1996, 10, 11),
            'status' => 'Online',
            'phonenumber' => '06 533757579',
            'api_token' => new Token(),
            'password' => bcrypt('admin'),
        ]);

        DB::table('users')->insert([
            'name' => 'test',
            'firstname' => 'test',
            'lastname' => 'test',
            'email' => 'test@test.nl',
            'gender' => 'man',
            'birthdate' => Carbon::createFromDate(1996, 10, 11),
            'status' => 'Online',
            'phonenumber' => '06 533757579',
            'api_token' => new Token(),
            'password' => bcrypt('client'),
        ]);
    }
}
