<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('statuses')->get()->count() == 0){

            DB::table('statuses')->insert([

                [
                    'id' => 1,
                    'description' => 'Ativo',
                    'tag'=>'itm'
                ],
                [
                    'id' => 2,
                    'description' => 'Cancelado',
                    'tag'=>'itm'
                ],
                [
                    'id' => 3,
                    'description' => 'Processado',
                    'tag'=>'itm'
                ],
                [
                    'id' => 4,
                    'description' => 'Em processamento',
                    'tag'=>'pay'
                ],
                [
                    'id' => 5,
                    'description' => 'Pago',
                    'tag'=>'pay'
                ],
                [
                    'id' => 6,
                    'description' => 'Rejeitado',
                    'tag'=>'pay'
                ]
                
            ]);

        } else { echo "Table Statuses is not empty, therefore NOT "; }
    }
}
