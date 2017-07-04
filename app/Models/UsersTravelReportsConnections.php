<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersTravelReportsConnections extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users_travel_reports_connections';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['users_id', 'travel_reports_id'];
}
