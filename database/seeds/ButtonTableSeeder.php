<?php

use Illuminate\Database\Seeder;

class ButtonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = [
//            [
//                'console_id' =>  1,
//                'button_id' => ,
//                'image_link' => null,
//                'website_link' => null,
//                'name_tag' => 'test knop 1',
//                'button_type' => 'non',
//            ],
//            [
//
//            ],
        ];

        DB::table('users')->insert($table);
    }
}
