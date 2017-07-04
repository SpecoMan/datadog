@extends('layouts.app')

@section('content')

    @if(isset($error))
        <div class="alert alert-danger">
            <strong>Error</strong> {{trans('system.bad_input')}}
        </div>
    @elseif(isset($success))
        <div class="alert alert-success">
            <strong>Success!</strong> {{trans('system.record_placed')}}
        </div>
    @endif
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
@endsection