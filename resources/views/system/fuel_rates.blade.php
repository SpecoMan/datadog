@extends('layouts.app')

@section('content')

    <div class="ve-table"
         style="margin:0 auto; width: 35%; border: 1px black solid; border-radius: 5px; padding: 5px">
        <table>
            <tbody>
                @foreach($vehiclesArray as $vehicle)
                    <tr>
                        <td>
                            {{$vehicle['value']}}
                        </td>
                        <td>
                            @if(isset($vehicle['0']))
                                {!! Form::open(['url' => route('fuel_rates.edit')]) !!}
                                <input type="hidden" name="id" value="{{$vehicle['0']['id']}}">
                                <input type="text" name="idle_consumption" value="{{ $vehicle['0']['idle'] }}" placeholder="{{ $vehicle['0']['idle'] }}">
                                <input type="text" name="going_consumption" value="{{ $vehicle['0']['going'] }}" placeholder="{{ $vehicle['0']['going'] }}">
                                <input type="text" name="unloading_consumption" value="{{ $vehicle['0']['unloading'] }}" placeholder="{{ $vehicle['0']['unloading'] }}">
                                <button type="submit" class="btn btn-success btn-xs">
                                    {{ trans('transport/vehicles.buttons.edit') }}
                                </button>
                                {!! Form::close() !!}
                            @else
                                {!! Form::open(['url' => route('fuel_rates.create')]) !!}
                                <input type="hidden" name="id" value="{{$vehicle['id']}}">
                                <input type="text" name="idle_consumption" placeholder="{{ trans('transport/fuel_rates.idle') }}">
                                <input type="text" name="going_consumption" placeholder="{{ trans('transport/fuel_rates.going') }}">
                                <input type="text" name="unloading_consumption" placeholder="{{ trans('transport/fuel_rates.unloading') }}">
                                <button type="submit" class="btn btn-success btn-xs">
                                    {{ trans('transport/vehicles.buttons.create') }}
                                </button>
                                {!! Form::close() !!}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



@endsection