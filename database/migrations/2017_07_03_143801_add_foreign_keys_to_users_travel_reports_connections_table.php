<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUsersTravelReportsConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users_travel_reports_connections', function(Blueprint $table)
		{
			$table->foreign('travel_reports_id', 'fk_users_travel_reports_connections_travel_reports1')->references('id')->on('travel_reports')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('users_id', 'fk_users_travel_reports_connections_users1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users_travel_reports_connections', function(Blueprint $table)
		{
			$table->dropForeign('fk_users_travel_reports_connections_travel_reports1');
			$table->dropForeign('fk_users_travel_reports_connections_users1');
		});
	}

}
