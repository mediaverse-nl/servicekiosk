<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([
            'account_type' => 'admin',
        ]);
        DB::table('role')->insert([
            'account_type' => 'admin',
        ]);
        DB::table('role')->insert([
            'account_type' => 'admin',
        ]);
        DB::table('role')->insert([
            'account_type' => 'client',
        ]);
    }
}
