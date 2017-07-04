<?php

namespace App\Http\Controllers;

use App\Models\TravelReports;
use App\Models\UsersTravelReportsConnections;
use App\User;
use Illuminate\Http\Request;

class UserTravelDataController extends Controller
{
    /**
     * showing user array
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $record = User::get()->toArray();

        return view('system.users_travel_data', ['users' => $record]);
    }

    /**
     * Showing Travel data array by time and user_id
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request)
    {
        $record = User::get()->toArray();

        $recordConnections = UsersTravelReportsConnections::where('users_id', $request->toArray()['user_id'])
            ->get()
            ->toArray();

        $userTravelData = [];

        foreach ($recordConnections as $key => $recordConnection) {
            $recordTravelData = TravelReports::where('id', $recordConnection['travel_reports_id'])->first()->toArray();

            //filtering date to be left only with month
            $month = substr(substr($recordTravelData['date'], 5), 0, -3);

            if ($month == $request['month'])
                $userTravelData[$key] = $recordTravelData;
        }

        return view('system.users_travel_data', ['users' => $record, 'userTravelData' => $userTravelData]);
    }
}
