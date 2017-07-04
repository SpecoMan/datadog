<?php

namespace App\Http\Controllers;

use App\Models\FuelRates;
use App\Models\TravelReports;
use App\Models\UsersTravelReportsConnections;
use App\Models\Vehicles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TravelDataController extends Controller
{
    public function index()
    {
        $vehiclesArray = $this->sortVehiclesArray();

        return view('system.travel_data', ['vehicles' => $vehiclesArray]);
    }

    public function create(Request $request)
    {

        $vehiclesArray = $this->sortVehiclesArray();

        $fuelRecords = FuelRates::all();

        if (isset($fuelRecords->toArray()[0])) {
            foreach ($fuelRecords as $fuelRecord)
                if ($fuelRecord->vehicle()->get()->toArray()['0']['id'] == $request->toArray()['vehicle_id']) {
                    $fuel = $fuelRecord->toArray();
                }
        }

        if ($fuel) {
            $fuelConsumptionTravelingToClient = ((strtotime($request->toArray()['time_enter_client']) -
                        strtotime($request->toArray()['time_left_terminal'])) / 3600) * $fuel['going'];
            $fuelConsumptionUnloading = ($request->toArray()['unload_time'] / 60) * $fuel['unloading'];
            $fuelConsumptionStanding = strtotime($request->toArray()['time_left_client']) -
                strtotime($request->toArray()['time_enter_client'])
                - ($request->toArray()['unload_time'] * 60);
            $fuelConsumptionStanding = ($fuelConsumptionStanding / 3600) * $fuel['idle'];
            $fuelConsumptionTravelingToTerminal = strtotime($request->toArray()['time_enter_terminal']) -
                strtotime($request->toArray()['time_left_client']);
            $fuelConsumptionTravelingToTerminal = ($fuelConsumptionTravelingToTerminal / 3600) * $fuel['going'];
            if ($fuelConsumptionTravelingToClient >= 0
                || $fuelConsumptionUnloading >= 0 || $fuelConsumptionStanding >= 0
                || $fuelConsumptionTravelingToTerminal >= 0
            ) {
                $totalFuelConsumption = $fuelConsumptionTravelingToTerminal
                    + $fuelConsumptionStanding + $fuelConsumptionUnloading
                    + $fuelConsumptionTravelingToClient;
            } else {
                return view('system.travel_data', ['vehicles' => $vehiclesArray, 'error' => 1]);
            }

        }

        $speedometerReading = $request->toArray()['speedometer_end'] - $request->toArray()['speedometer_start'];

        if ($totalFuelConsumption >= 0 && $speedometerReading >= 0) {
            $record = new TravelReports([
                'date' => $request->toArray()['date'],
                'route' => $request->toArray()['destination'],
                'terminal_left' => $request->toArray()['time_left_terminal'],
                'terminal_arrived' => $request->toArray()['time_enter_terminal'],
                'speedometer_readings_before' => $request->toArray()['speedometer_start'],
                'speedometer_readings_after' => $request->toArray()['speedometer_end'],
                'client_arrived' => $request->toArray()['time_enter_client'],
                'client_left' => $request->toArray()['time_left_client'],
                'unloading_time' => $request->toArray()['unload_time'],
                'distance' => $speedometerReading,
                'fuel' => $totalFuelConsumption
            ]);

            $record->save();

            $recordConnections = new UsersTravelReportsConnections([
                'users_id' => Auth::id(),
                'travel_reports_id' => $record->toArray()['id']
            ]);

            $recordConnections->save();
        } else {
            return view('system.travel_data', ['vehicles' => $vehiclesArray, 'error' => 1]);

        }

        return view('system.travel_data', ['vehicles' => $vehiclesArray, 'success' => 1]);

    }

    public function sortVehiclesArray(){

        $vehiclesRecords = Vehicles::get()->toArray();
        $fuelRecords = FuelRates::all();

        if (isset($fuelRecords->toArray()[0])) {
            foreach ($vehiclesRecords as $key => $vehiclesRecord)
                foreach ($fuelRecords as $fuelRecord)
                    if ($fuelRecord->vehicle()->get()->toArray()['0']['id'] == $vehiclesRecord['id']) {
                        $vehiclesArray[$key] = $vehiclesRecord;
                        $vehiclesArray[$key][0] = $fuelRecord->toArray();
                    }
        }

        return $vehiclesArray;

    }
}
