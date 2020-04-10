<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStocksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('stocks', function(Blueprint $table)
		{
			$table->foreign('branch_id', 'stocks_fk0')->references('id')->on('branches')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('product_id', 'stocks_fk1')->references('id')->on('products')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('stocks', function(Blueprint $table)
		{
			$table->dropForeign('stocks_fk0');
			$table->dropForeign('stocks_fk1');
		});
	}

}
