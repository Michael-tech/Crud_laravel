@if(Session::has(Mensaje)){{
    Session::get(Mensaje)
}}
@endif
<a href="{{ url('empleados/create') }}">Create</a>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Photography</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Created at</th>

        </tr>
    </thead>
    <tbody>
        @foreach($empleados as $empleado)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                <img src="{{ asset('storage').'/'. $empleado->photo }}" alt="" width="200">
            </td>
            <td>{{ $empleado->first_name }}</td>
            <td>{{ $empleado->last_name }}</td>
            <td>{{ $empleado->email }}</td>
            <td>
                <a href="{{ url('/empleados/'.$empleado->id. '/edit' ) }}">Update</a>

                |
                <form action="{{ url('/empleados/'.$empleado->id) }}" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button type="submit" onclick="return confirm('Borrar?');">Delete</button>

                </form>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>