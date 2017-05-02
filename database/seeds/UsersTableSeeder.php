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
            'voornaam' => 'deveron',
            'achternaam' => 'reniers',
            'geslacht' => 'Man',
            'leeftijd' => Carbon::now(),
            'adress' => 'pietercoeckestraat 12',
            'zipcode' => '5643 VK',
            'city' => 'Eindhoven',
            'companyname' => 'Mediaverse',
            'companyname' => 'Mediaverse',
            'status' => 'Online',
            'telefoon' => '06 53779761',
            'email' => 'def-lol-lol@hotmail.com',
            'password' => bcrypt('admin'),
            'adminstatus' => 1,
        ]);
    }
}
