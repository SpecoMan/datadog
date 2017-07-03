<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTravelReportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('travel_reports', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->date('date');
			$table->text('route', 65535);
			$table->time('terminal_left');
			$table->time('terminal_arived');
			$table->integer('speedometer_readings_before')->nullable();
			$table->integer('speedometer_redings_after');
			$table->time('client_arrived');
			$table->time('client_left');
			$table->integer('unloading_time');
			$table->integer('distance')->nullable()->unique('distance_UNIQUE');
			$table->integer('fuel');
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
		Schema::drop('travel_reports');
	}

}
