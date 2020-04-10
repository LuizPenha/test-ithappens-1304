<?php

use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('types')->get()->count() == 0){

            DB::table('types')->insert([

                [
                    'id' => 1,
                    'description' => 'Entrada',
                    'tag'=>'Ord',
                ],
                [
                    'id' => 2,
                    'description' => 'Saida',
                    'tag'=>'Ord',
                ],
                [
                    'id' => 3,
                    'description' => 'Client',
                    'tag'=>'usr',
                ],
                [
                    'id' => 4,
                    'description' => 'Employee',
                    'tag'=>'usr',
                ],
                [
                    'id' => 5,
                    'description' => 'Debito',
                    'tag'=>'pay',
                ],
                [
                    'id' => 6,
                    'description' => 'Boleto',
                    'tag'=>'pay',
                ],
                [
                    'id' => 7,
                    'description' => 'Crédito',
                    'tag'=>'pay',
                ]

                
            ]);

        } else { echo "Table Types is not empty, therefore NOT "; }
    }
}
