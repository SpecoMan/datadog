<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TravelReports extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'route',
        'terminal_left',
        'terminal_arrived',
        'speedometer_readings_before',
        'speedometer_readings_after',
        'client_arrived',
        'client_left',
        'unloading_time',
        'distance',
        'fuel',


    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
