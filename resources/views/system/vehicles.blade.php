@extends('layouts.app')

@section('content')


    <div class="ve-table"
         style="margin:0 auto; width: 35%; border: 1px black solid; border-radius: 5px; padding: 5px">
        {!! Form::open(['url' => route('vehicles.create')]) !!}
        <div class="ve-table-create"
             style="margin:10px auto; width: 50%;">
            <input type="text" name="vehicle" placeholder="{{ trans('transport/vehicles.enter.name') }}" required>
            <button type="submit" class="btn btn-success btn-xs">
                {{ trans('transport/vehicles.buttons.save') }}
            </button>
        </div>
        {!! Form::close() !!}
        <table>
            <tbody>
            @foreach($records as $record)
                <tr>
                    <td>
                        {{$record['value']}}
                    </td>
                    <td>
                        {!! Form::open(['url' => route('vehicles.edit')]) !!}
                        <button onclick="edit('{{$record['value']}}', '{{$record['id']}}')"
                                class="btn btn-primary btn-xs">
                            {{ trans('transport/vehicles.buttons.edit') }}
                        </button>
                        <input type="hidden" name="id" value="{{$record['id']}}">
                        <input type="hidden" name="vehicle" id="vehicleEdit{{$record['id']}}" value="">
                        {!! Form::close() !!}

                        {!! Form::open(['url' => route('vehicles.delete')]) !!}
                        <button class="btn btn-danger btn-xs">
                            {{ trans('transport/vehicles.buttons.delete') }}
                        </button>
                        <input type="hidden" name="id" value="{{$record['id']}}">
                        {!! Form::close() !!}

                    </td>

                </tr>

            @endforeach
            </tbody>
        </table>
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

    {{--<tbody>
    {!! Form::open(['url' => route('vehicles.create')]) !!}
    <tr>
        <td>
            <input type="text" name="vehicle" placeholder="{{ trans('transport/vehicles.enter.name') }}" required>
        </td>
        <td>
            <button type="submit" class="btn btn-success btn-xs">
                {{ trans('transport/vehicles.buttons.save') }}
            </button>
        </td>
    </tr>
    {!! Form::close() !!}
    </tbody>--}}
@endsection