<?php

namespace App\Http\Controllers;

use App\Models\FuelRates;
use App\Models\Vehicles;
use App\Models\VehiclesFuelRatesConnections;
use Illuminate\Http\Request;

class FuelRatesController extends Controller
{
    public function index()
    {
        $vehiclesRecords = Vehicles::get()->toArray();
        $fuelRecords = FuelRates::all();

        $vehiclesArray = [];
        if (isset($fuelRecords->toArray()[0])) {
            foreach ($vehiclesRecords as $key => $vehiclesRecord)
                foreach ($fuelRecords as $fuelRecord)
                    if ($fuelRecord->vehicle()->get()->toArray()['0']['id'] == $vehiclesRecord['id']) {
                        $vehiclesArray[$key] = $vehiclesRecord;
                        $vehiclesArray[$key][0] = $fuelRecord->toArray();
                    } elseif (!isset($vehiclesArray[$key]['0'])) {
                        $vehiclesArray[$key] = $vehiclesRecord;
                    }
        } else
            $vehiclesArray = $vehiclesRecords;

        return view('system.fuel_rates', ['vehiclesArray' => $vehiclesArray]);
    }

    public function create(Request $request)
    {
        $record = new FuelRates([
            'idle' => $request->toArray()['idle_consumption'],
            'going' => $request->toArray()['going_consumption'],
            'unloading' => $request->toArray()['unloading_consumption'],
        ]);

        $record->save();


        $recordConnections = new VehiclesFuelRatesConnections([
            'vehicle_id' => $request->toArray()['id'],
            'fuel_rate_id' => $record->toArray()['id'],
        ]);

        $recordConnections->save();

        return back();
    }


    public function edit(Request $request)
    {
        FuelRates::where('id', $request->toArray()['id'])
            ->update([
                'idle' => $request->toArray()['idle_consumption'],
                'going' => $request->toArray()['going_consumption'],
                'unloading' => $request->toArray()['unloading_consumption'],
            ]);

        return back();
    }


}
