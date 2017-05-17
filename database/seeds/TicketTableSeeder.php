<?php

use Illuminate\Database\Seeder;

class TicketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ticket')->insert([
            'user_id' => '1',
            'ticket_id' => '1',
            'titel' => 'test',
            'text' => 'this is a ticket test',
            'priority' => '1',
            'status' => 'pending',
        ]);
        DB::table('ticket')->insert([
            'user_id' => '2',
            'ticket_id' => '1',
            'titel' => 'test',
            'text' => 'this is a ticket test',
            'priority' => '1',
            'status' => 'pending',
        ]);
        DB::table('ticket')->insert([
            'user_id' => '3',
            'ticket_id' => '1',
            'titel' => 'test',
            'text' => 'this is a ticket test',
            'priority' => '1',
            'status' => 'pending',
        ]);
    }
}
