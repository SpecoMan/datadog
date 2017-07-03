<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTravelReportsConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_travel_reports_connections', function(Blueprint $table)
		{
			$table->integer('users_id')->index('fk_users_travel_reports_connections_users1_idx');
			$table->integer('travel_reports_id')->index('fk_users_travel_reports_connections_travel_reports1_idx');
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users_travel_reports_connections');
	}

}
