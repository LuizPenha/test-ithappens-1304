<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOrderItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('order_items', function(Blueprint $table)
		{
			$table->foreign('stock_id', 'order_items_fk0')->references('id')->on('stocks')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('order_di', 'order_items_fk1')->references('id')->on('orders')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('status_id', 'order_items_fk2')->references('id')->on('statuses')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('order_items', function(Blueprint $table)
		{
			$table->dropForeign('order_items_fk0');
			$table->dropForeign('order_items_fk1');
			$table->dropForeign('order_items_fk2');
		});
	}

}
