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
            [
                'console_id' => 1,
                'button_id' => 1,
                'image_link' => null,
                'website_link' => null,
                'name_tag' => 'test knop 1',
                'button_type' => 'non',
            ],
            [
                'console_id' => 2,
                'button_id' => 2,
                'image_link' => null,
                'website_link' => null,
                'name_tag' => 'test knop 2',
                'button_type' => 'non',
            ],
            [
                'console_id' => 3,
                'button_id' => 3,
                'image_link' => null,
                'website_link' => null,
                'name_tag' => 'test knop 3',
                'button_type' => 'non',
            ],
        ];

        DB::table('button')->insert($table);
    }
}
