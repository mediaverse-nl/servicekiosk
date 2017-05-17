<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client')->insert([
            'customerId' => '3',
            'user_id' => '3',
            'adress' => 'beukenlaan 21',
            'zipcode' => '5741dl',
            'city' => 'beek en donk',
            'companyname' => 'Mediaverse',
            'kvk' => '00000000',
            'vatnumber' => '0000000',
        ]);
        DB::table('client')->insert([
            'customerId' => '2',
            'user_id' => '2',
            'adress' => 'test 21',
            'zipcode' => '1111aa',
            'city' => 'einvhoven',
            'companyname' => 'Mediaverse',
            'kvk' => '00000000',
            'vatnumber' => '0000000',
        ]);
        DB::table('client')->insert([
            'customerId' => '1',
            'user_id' => '1',
            'adress' => 'test 22',
            'zipcode' => '1111ab',
            'city' => 'einvhoven',
            'companyname' => 'Mediaverse',
            'kvk' => '00000000',
            'vatnumber' => '0000000',
        ]);
    }
}
