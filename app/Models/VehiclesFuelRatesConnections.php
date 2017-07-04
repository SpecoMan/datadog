<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehiclesFuelRatesConnections extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vehicles_fuel_rates_connections';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['vehicle_id', 'fuel_rate_id'];
}
