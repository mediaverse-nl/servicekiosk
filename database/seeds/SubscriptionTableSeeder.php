<?php

use Illuminate\Database\Seeder;

class SubscriptionTableSeeder extends Seeder
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
                'console_id' => random_int(1, 10),
                'subscription_type_id' => random_int(1, 10),
                'startdate' => date("Y-m-d"),
                'enddate' => date("Y-m-d")
            ],
            [
                'console_id' => random_int(1, 10),
                'subscription_type_id' => random_int(1, 10),
                'startdate' => date("Y-m-d"),
                'enddate' => date("Y-m-d")
            ],
            [
                'console_id' => random_int(1, 10),
                'subscription_type_id' => random_int(1, 10),
                'startdate' => date("Y-m-d"),
                'enddate' => date("Y-m-d")
            ],
            [
                'console_id' => random_int(1, 10),
                'subscription_type_id' => random_int(1, 10),
                'startdate' => date("Y-m-d"),
                'enddate' => date("Y-m-d")
            ],
            [
                'console_id' => random_int(1, 10),
                'subscription_type_id' => random_int(1, 10),
                'startdate' => date("Y-m-d"),
                'enddate' => date("Y-m-d")
            ],
            [
                'console_id' => random_int(1, 10),
                'subscription_type_id' => random_int(1, 10),
                'startdate' => date("Y-m-d"),
                'enddate' => date("Y-m-d")
            ],
            [
                'console_id' => random_int(1, 10),
                'subscription_type_id' => random_int(1, 10),
                'startdate' => date("Y-m-d"),
                'enddate' => date("Y-m-d")
            ],
            [
                'console_id' => random_int(1, 10),
                'subscription_type_id' => random_int(1, 10),
                'startdate' => date("Y-m-d"),
                'enddate' => date("Y-m-d")
            ],
            [
                'console_id' => random_int(1, 10),
                'subscription_type_id' => random_int(1, 10),
                'startdate' => date("Y-m-d"),
                'enddate' => date("Y-m-d")
            ],
            [
                'console_id' => random_int(1, 10),
                'subscription_type_id' => random_int(1, 10),
                'startdate' => date("Y-m-d"),
                'enddate' => date("Y-m-d")
            ],
            [
                'console_id' => random_int(1, 10),
                'subscription_type_id' => random_int(1, 10),
                'startdate' => date("Y-m-d"),
                'enddate' => date("Y-m-d")
            ],
        ];

        DB::table('subscription')->insert($table);
    }
}
