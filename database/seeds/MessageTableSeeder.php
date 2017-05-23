<?php

use Illuminate\Database\Seeder;

class MessageTableSeeder extends Seeder
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
                'user_id' => '3',
                'message_id' => '1',
                'ticket_id' => '1',
                'tekst' => 'this is a test',
                'status' => 'pending',
            ]
        ];

        DB::table('message')->insert($table);
    }
}
