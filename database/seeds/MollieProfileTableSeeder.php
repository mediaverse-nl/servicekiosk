<?php

use Illuminate\Database\Seeder;

class MollieProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = [
            [
                'client_id' => '1',
                'amount' => '999.99',
                'description' => 'ths isis atest',
                'recurring_type' => 'null',
                'status' => 'creditcard',
            ],
            [
                'client_id' => '2',
                'amount' => '999.99',
                'description' => 'ths isis atest',
                'recurring_type' => 'null',
                'status' => 'creditcard',
            ],
            [
                'client_id' => '2',
                'amount' => '999.99',
                'description' => 'ths isis atest',
                'recurring_type' => 'null',
                'status' => 'creditcard',
            ]
        ];

        DB::table('mollie_profile')->insert($table);
    }
}
