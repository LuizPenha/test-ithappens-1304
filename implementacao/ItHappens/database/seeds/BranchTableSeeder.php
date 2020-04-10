<?php

use Illuminate\Database\Seeder;

class BranchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Branch::truncate();
        factory(\App\Branch::class, 1)->create();
        factory(\App\Branch::class, 5)->create();

    }
}
