<?php

use Illuminate\Database\Seeder;

class ConsoleTableSeeder extends Seeder
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
                'user_id' => '1',
                'imei' => '00000',
            ],
            [
                'user_id' => '2',
                'imei' => '00001',
            ],
            [
                'user_id' => '3',
                'imei' => '00002',
            ],
        ];

        DB::table('console')->insert($table);
    }
}
