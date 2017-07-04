@extends('layouts.app')

@section('content')

    <div class="row" style="margin:0 auto; width: 20%; border: 1px black solid; border-radius: 5px; padding: 5px">
        <div class="row">
            {!! Form::open(['url' => route('vehicles.create')]) !!}
            <div class="col-sm-5">
                <input type="text" name="vehicle" placeholder="{{ trans('system.vehicles.enter.name') }}" required>
            </div>
            <div class="col-sm-3">
            </div>
            <button type="submit" class="btn btn-success btn-xs">
                {{ trans('system.create') }}
            </button>
        </div>
        {!! Form::close() !!}

        <div class="row">
            @foreach($records as $record)
                <div class="col-sm-4">
                    {{$record['value']}}
                </div>
                <div class="col-sm-4">
                    {!! Form::open(['url' => route('vehicles.edit')]) !!}
                    <button onclick="edit('{{$record['value']}}', '{{$record['id']}}')"
                            class="btn btn-primary btn-xs">
                        {{ trans('system.edit') }}
                    </button>
                    <input type="hidden" name="id" value="{{$record['id']}}">
                    <input type="hidden" name="vehicle" id="vehicleEdit{{$record['id']}}" value="">
                    {!! Form::close() !!}
                </div>
                <div class="col-sm-4">
                    {!! Form::open(['url' => route('vehicles.delete')]) !!}
                    <button class="btn btn-danger btn-xs">
                        {{ trans('system.delete') }}
                    </button>
                    <input type="hidden" name="id" value="{{$record['id']}}">
                    {!! Form::close() !!}
                </div>


            @endforeach
        </div>

    </div>

    <script>
        function edit(vehicle, id) {
            var vehicleEdit = prompt("Edit vehicle", vehicle);
            if (vehicleEdit == null || vehicleEdit == "")
                document.getElementById('vehicleEdit' + id).value = vehicle;
            else
                document.getElementById('vehicleEdit' + id).value = vehicleEdit;

        }
    </script>
@endsection