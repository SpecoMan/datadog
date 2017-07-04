<?php

namespace App\Http\Controllers;

use App\Models\FuelRates;
use App\Models\Vehicles;
use App\Models\VehiclesFuelRatesConnections;
use Illuminate\Http\Request;

class VehiclesController extends Controller
{
    public function index()
    {
        return view('system.vehicles', ['records' => Vehicles::get()->toArray()]);
    }

    public function create(Request $request)
    {
        $record = new Vehicles([
            'value' => $request->toArray()['vehicle']
        ]);

        $record->save();
        return back();
    }

    public function edit(Request $request)
    {
        Vehicles::where('id',$request->toArray()['id'])
            ->update([
                'value' => $request->toArray()['vehicle']
            ]);

        return back();
    }

    public function delete(Request $request)
    {
        $recordConnection = VehiclesFuelRatesConnections::where('vehicle_id', $request->toArray()['id']);
        if($recordConnection->first()){
            $recordFuel = FuelRates::where('id',$recordConnection->first()->toArray()['fuel_rate_id']);
            $recordConnection->delete();
            $recordFuel->delete();
        }
        Vehicles::where('id', $request->toArray()['id'])->delete();

        return back();
    }
}
