<?php

use Illuminate\Database\Seeder;

class SubscriptionTypeTableSeeder extends Seeder
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
                'duration' => random_int(1, 12).' maanden',
                'price' => random_int(1, 50).'.'.random_int(0, 99),
                'discount' => random_int(0, 10).'.'.random_int(0, 99),
                'name' => str_random()
            ],
            [
                'duration' => random_int(1, 12).' maanden',
                'price' => random_int(1, 50).'.'.random_int(0, 99),
                'discount' => random_int(0, 10).'.'.random_int(0, 99),
                'name' => str_random()
            ],
            [
                'duration' => random_int(1, 12).' maanden',
                'price' => random_int(1, 50).'.'.random_int(0, 99),
                'discount' => random_int(0, 10).'.'.random_int(0, 99),
                'name' => str_random()
            ],
            [
                'duration' => random_int(1, 12).' maanden',
                'price' => random_int(1, 50).'.'.random_int(0, 99),
                'discount' => random_int(0, 10).'.'.random_int(0, 99),
                'name' => str_random()
            ],
            [
                'duration' => random_int(1, 12).' maanden',
                'price' => random_int(1, 50).'.'.random_int(0, 99),
                'discount' => random_int(0, 10).'.'.random_int(0, 99),
                'name' => str_random()
            ],
            [
                'duration' => random_int(1, 12).' maanden',
                'price' => random_int(1, 50).'.'.random_int(0, 99),
                'discount' => random_int(0, 10).'.'.random_int(0, 99),
                'name' => str_random()
            ],
            [
                'duration' => random_int(1, 12).' maanden',
                'price' => random_int(1, 50).'.'.random_int(0, 99),
                'discount' => random_int(0, 10).'.'.random_int(0, 99),
                'name' => str_random()
            ],
            [
                'duration' => random_int(1, 12).' maanden',
                'price' => random_int(1, 50).'.'.random_int(0, 99),
                'discount' => random_int(0, 10).'.'.random_int(0, 99),
                'name' => str_random()
            ],
            [
                'duration' => random_int(1, 12).' maanden',
                'price' => random_int(1, 50).'.'.random_int(0, 99),
                'discount' => random_int(0, 10).'.'.random_int(0, 99),
                'name' => str_random()
            ],
        ];

        DB::table('subscription_type')->insert($table);
    }
}
