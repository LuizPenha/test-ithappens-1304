<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    
        
        DB::statement('set foreign_key_checks= 0');
            $this->call(TypeTableSeeder::class);
            $this->call(StatusTableSeeder::class);
            $this->call(UserTableSeeder::class);
                                        //$this->call(BranchTableSeeder::class);
            $this->call(EmployeeTableSeeder::class);
            $this->call(ProductTableSeeder::class);
            $this->call(StockTableSeeder::class);
        DB::statement('set foreign_key_checks= 1');

    }
}
