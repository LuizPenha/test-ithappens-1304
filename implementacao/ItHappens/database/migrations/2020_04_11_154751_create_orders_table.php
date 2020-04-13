<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('branch_id')->index('orders_fk0');
			$table->integer('type_id')->index('orders_fk1');
			$table->integer('employee_id')->index('orders_fk2');
			$table->integer('client_id')->index('orders_fk3');
			$table->string('Observation', 250);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orders');
	}

}
