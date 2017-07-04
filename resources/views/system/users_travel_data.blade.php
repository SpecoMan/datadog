@extends('layouts.app')

@section('content')
    @if(isset($userTravelData))
        <div class="results_table">
            <table>
                <tbody>
                <tr>
                    <th>
                        <p>{{ trans('system.nr') }}</p>
                    </th>
                    <th>
                        <p>{{ trans('system.date') }}</p>
                    </th>
                    <th>
                        <p>{{ trans('system.destination') }}</p>
                    </th>
                    <th>
                        <p>{{ trans('system.time_left_terminal') }}</p>
                    </th>
                    <th>
                        <p>{{ trans('system.speedometer_start') }}</p>
                    </th>
                    <th>
                        <p>{{ trans('system.time_enter_client') }}</p>
                    </th>
                    <th>
                        <p>{{ trans('system.unload_time') }}</p>
                    </th>
                    <th>
                        <p>{{ trans('system.time_left_client') }}</p>
                    </th>
                    <th>
                        <p>{{ trans('system.time_enter_terminal') }}</p>
                    </th>
                    <th>
                        <p>{{ trans('system.speedometer_end') }}</p>
                    </th>
                    <th>
                        <p>{{ trans('system.distance') }}</p>
                    </th>
                    <th>
                        <p>{{ trans('system.fuel') }}</p>
                    </th>
                </tr>

                @foreach($userTravelData as $key => $value)
                    <tr>
                        <td>{{$key +1 }}</td>
                        <td>{{$value['date']}}</td>
                        <td>{{$value['route'] }}</td>
                        <td>{{$value['terminal_left']}}</td>
                        <td>{{$value['speedometer_readings_before']}}</td>
                        <td>{{$value['client_arrived']}}</td>
                        <td>{{$value['unloading_time']}}</td>
                        <td>{{$value['client_left']}}</td>
                        <td>{{$value['terminal_arrived']}}</td>
                        <td>{{$value['speedometer_readings_after']}}</td>
                        <td>{{$value['distance']}}</td>
                        <td>{{$value['fuel']}}</td>


                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <br>
    <div class="container-fluid">
        <div class="row">

            {!! Form::open(['url' => route('users_travel_data.show')]) !!}
            <div class="col-sm-2">
                <select name="user_id">
                    @foreach($users as $user)
                        <option name="user_id" value="{{$user['id']}}">{{$user['name']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-2">
                <div class="col-xs-10">
                    <div class="input-group date" id="datetimepicker10">

                        <input type="text" name="month" class="form-control"/>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <button
                        type="submit" class="btn btn-success btn-xs">
                    {{ trans('system.create') }}
                </button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>



@endsection