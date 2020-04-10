<?php

use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Employee::truncate();

        factory(\App\Employee::class, 6)->create();

        // factory(App\Employee::class, 5)->create()->each(function($employee) {

        //     $employee->branch()->save(factory(App\Branch::class)->make());

        // )};
    }
}
