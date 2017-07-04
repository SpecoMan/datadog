<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FuelRates extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idle', 'going', 'unloading'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function vehicle()
    {
        $connectionsTable = (new VehiclesFuelRatesConnections())->getTable();
        return $this->belongsToMany(Vehicles::class, $connectionsTable, 'fuel_rate_id', 'vehicle_id');
    }
}
