@extends('layouts.app')

@section('content')
    <div class="ve-table"
         style="margin:0 auto; width: 100%; border: 1px black solid; border-radius: 5px; padding: 5px">
        <table>
            <tbody>
            <tr>
                <td>

                    {!! Form::open(['url' => route('travel_data.create')]) !!}
                    <label>{{ trans('system.vehicles') }}</label>
                    <select name="vehicle_id">
                        @foreach($vehicles as $vehicle)
                            <option name="user_id" value="{{$vehicle['id']}}">{{$vehicle['value']}}</option>
                        @endforeach
                    </select><br>
                    <label for="date">{{ trans('system.date') }}</label>
                    <input type="date" id="date" name="date" required>

                    <label>{{ trans('system.destination') }}</label>
                    <input type="text" name="destination" required>
                    <br>

                    <label for="date">{{ trans('system.speedometer_start') }}</label>
                    <input type="number" id="speedometer_start" name="speedometer_start" required>

                    <label for="date">{{ trans('system.speedometer_end') }}</label>
                    <input type="number" id="speedometer_end" name="speedometer_end" required>
                    <br>

                    <label for="date">{{ trans('system.time_left_terminal') }}</label>
                    <input type="time" id="time_left_terminal" name="time_left_terminal" required>

                    <label for="date">{{ trans('system.time_enter_client') }}</label>
                    <input type="time" id="time_enter_client" name="time_enter_client" required>

                    <label for="date">{{ trans('system.unload_time') }}</label>
                    <input type="number" id="unload_time" name="unload_time" required>
                    <br>

                    <label for="date">{{ trans('system.time_left_client') }}</label>
                    <input type="time" id="time_left_client" name="time_left_client" required>

                    <label for="date">{{ trans('system.time_enter_terminal') }}</label>
                    <input type="time" id="time_enter_terminal" name="time_enter_terminal" required>

                    <br>
                    <button
                            type="submit" class="btn btn-success btn-xs">
                        {{ trans('system.create') }}
                    </button>
                    {!! Form::close() !!}
                </td>

            </tr>
            </tbody>
        </table>
    </div>

    {{--<script>--}}
    {{--function count(idle,going,unloading) {--}}

    {{--var date = document.getElementById('date').value;--}}
    {{--var timeLeftTerminal = document.getElementById('time_left_terminal').value;--}}
    {{--var speedometerStart = document.getElementById('speedometer_start').value;--}}
    {{--var timeEnterClient = document.getElementById('time_enter_client').value;--}}
    {{--var unloadTime = document.getElementById('unload_time').value;--}}
    {{--var timeLeftClient = document.getElementById('time_left_client').value;--}}
    {{--var timeEnterTerminal = document.getElementById('time_enter_terminal').value;--}}
    {{--var speedometerEnd = document.getElementById('speedometer_end').value;--}}

    {{--var timestampTLT = Date.parse(date + " " + timeLeftTerminal);--}}
    {{--var timestampTEC = Date.parse(date + " " + timeEnterClient);--}}

    {{--var travelConsumption;--}}
    {{--var travelToClientConsumption = (((timestampTEC - timestampTLT)/60000)/ 60) * going;--}}
    {{--alert(going + " " + travelToClientConsumption);--}}
    {{--if(speedometerEnd - speedometerStart > 0)--}}
    {{--Document.getElementById('destinationLength').value = speedometerEnd - speedometerStart;--}}
    {{--else--}}
    {{--Document.getElementById('destinationLength').value = 0;--}}

    {{--}--}}
    {{--</script>--}}
@endsection