@extends('layouts.app')

@section('content')

<div class="container">

    @if(Session::has('Message')){{
    Session::get('Message')
    }}
    @endif
    <a href="{{ url('empleados/create') }}" class="btn btn-success">Create</a>
    <br>
    <br>

    <table class="table table-light table-hover">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Photography</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created at</th>

            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $empleado)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <img src="{{ asset('storage').'/'. $empleado->photo }}" alt="" width="100" class=" img-fluid">
                </td>
                <td>{{ $empleado->first_name }} {{ $empleado->last_name }}</td>
               
                <td>{{ $empleado->email }}</td>
                <td>
                    <a href="{{ url('/empleados/'.$empleado->id. '/edit' ) }}" class="btn btn-primary">Update</a>

                    |
                    <form action="{{ url('/empleados/'.$empleado->id) }}" method="post" style="display:inline">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" onclick="return confirm('Borrar?');" class="btn btn-danger">Delete</button>

                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection