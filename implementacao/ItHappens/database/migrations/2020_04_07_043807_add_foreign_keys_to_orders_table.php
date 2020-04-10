<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('orders', function(Blueprint $table)
		{
			$table->foreign('branch_id', 'orders_fk0')->references('id')->on('branches')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('type_id', 'orders_fk1')->references('id')->on('types')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('employee_id', 'orders_fk2')->references('id')->on('employees')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('client_id', 'orders_fk3')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('orders', function(Blueprint $table)
		{
			$table->dropForeign('orders_fk0');
			$table->dropForeign('orders_fk1');
			$table->dropForeign('orders_fk2');
			$table->dropForeign('orders_fk3');
		});
	}

}
