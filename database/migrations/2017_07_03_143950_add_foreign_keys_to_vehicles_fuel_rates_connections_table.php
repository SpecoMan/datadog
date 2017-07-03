<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVehiclesFuelRatesConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vehicles_fuel_rates_connections', function(Blueprint $table)
		{
			$table->foreign('fuel_rate_id', 'fk_vehicles_fuel_rates_connections_fuel_rates1')->references('id')->on('fuel_rates')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('vehicle_id', 'fk_vehicles_fuel_rates_connections_vehicles')->references('id')->on('vehicles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vehicles_fuel_rates_connections', function(Blueprint $table)
		{
			$table->dropForeign('fk_vehicles_fuel_rates_connections_fuel_rates1');
			$table->dropForeign('fk_vehicles_fuel_rates_connections_vehicles');
		});
	}

}
