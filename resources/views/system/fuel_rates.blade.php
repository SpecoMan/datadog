@extends('layouts.app')

@section('content')

    <div class="ve-table"
         style="margin:0 auto; width: 40%; border: 1px black solid; border-radius: 5px; padding: 5px">
        <table style="margin: 0 auto">
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
                                <input type="text" name="idle_consumption" value="{{ $vehicle['0']['idle'] }}" maxlength="4" size="2">l/h
                                <input type="text" name="going_consumption" value="{{ $vehicle['0']['going'] }}" maxlength="4" size="2">l/h
                                <input type="text" name="unloading_consumption" value="{{ $vehicle['0']['unloading'] }}" maxlength="4" size="2">l/h
                                <button type="submit" class="btn btn-success btn-xs">
                                    {{ trans('system.edit') }}
                                </button>
                                {!! Form::close() !!}
                            @else
                                {!! Form::open(['url' => route('fuel_rates.create')]) !!}
                                <input type="hidden" name="id" value="{{$vehicle['id']}}">
                                <input type="text" name="idle_consumption" placeholder="{{ trans('system.fuel_rates.idle') }}"  maxlength="4" size="4" required>
                                <input type="text" name="going_consumption" placeholder="{{ trans('system.fuel_rates.going') }}" maxlength="4" size="4" required>
                                <input type="text" name="unloading_consumption" placeholder="{{ trans('system.fuel_rates.unloading') }}"  maxlength="4" size="4" required>
                                <button type="submit" class="btn btn-success btn-xs">
                                    {{ trans('system.create') }}
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