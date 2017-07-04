<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserTravelDataController extends Controller
{
    public function index()
    {
        return view('system.users_travel_data');
    }
}
