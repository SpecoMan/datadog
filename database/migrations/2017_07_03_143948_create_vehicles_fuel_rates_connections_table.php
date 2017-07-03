<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehiclesFuelRatesConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicles_fuel_rates_connections', function(Blueprint $table)
		{
			$table->integer('vehicle_id')->index('fk_vehicles_fuel_rates_connections_vehicles_idx');
			$table->integer('fuel_rate_id')->index('fk_vehicles_fuel_rates_connections_fuel_rates1_idx');
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
		Schema::drop('vehicles_fuel_rates_connections');
	}

}
