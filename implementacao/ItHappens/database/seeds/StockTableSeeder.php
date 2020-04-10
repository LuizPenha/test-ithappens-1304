<?php

use Illuminate\Database\Seeder;

class StockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        \App\Stock::truncate();
/*      $branches = App\Branch::count();
        $products = App\Product::count();
        //factory(\App\Stock::class, 300)->create();
        foreach(range(1, $branches ^ $products ) as $i){
        factory(\App\Stock::class)->create()->save();*/
        $branches = App\Branch::all();
        $products = App\Product::all();

        for($i = 0; $i < count($branches); $i++)
        {
            for( $j = 0; $j < count($products); $j++)
            {
                App\Stock::create([
                    'branch_id' => $branches[$i]['id'],
                    'product_id' => $products[$j]['id'],
                    'qtd' => $faker->numberBetween(60,210)
                ]);
            }
        }
    }
}

