<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
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
                'name' => 'Cars regular fit bermuda',
                'description' => 'Heren bermuda van Cars. Met 2 steekzakken, 1 muntzak en 2 achterzakken. De bermuda heeft een regular fit en sluit met een rits en knoop',
                'status' => 'Online'
            ],
            [
                'name' => 'Cars Baro T-shirt',
                'description' => "Heren T-shirt van Cars. Model 'Baro'. Met korte mouwen met omslag, een ronde hals en een all over print. Het model heeft een zakje op borst en een rechte pasvorm",
                'status' => 'Online'
            ],
            [
                'name' => 'Cars slim fit jog denim Prinze',
                'description' => "Heren jog denim van Cars, model 'Prinze'. 5 pocket model jog denim met een slim fit en een ritssluiting",
                'status' => 'Online'
            ],
        ];

        DB::table('product')->insert($table);
    }
}
