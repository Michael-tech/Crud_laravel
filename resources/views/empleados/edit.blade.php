este es editar

<form action="{{ url('/empleados/'.$empleado->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}
    <label for="name"> {{ 'First Name' }}</label>
    <input type="text" name="first_name" id="name" value="{{ $empleado->first_name }}">
    <br>
    <label for="last_name"> {{ 'Last Name' }}</label>
    <input type="text" name="last_name" id="last_name" value="{{ $empleado->last_name }}">
    <br>

    <label for="email"> {{ 'Email' }}</label>
    <input type="email" name="email" id="email" value="{{ $empleado->email }}">
    <br>

    <label for="photo"> {{ 'Photography' }}</label>
        <br>
    
                <img src="{{ asset('storage').'/'. $empleado->photo }}" alt="" width="200">
        <br>

    <input type="file" name="photo" id="photo" >

        {{ $empleado->photo }}
    <input type="submit" value="Update">
    <a href="{{ url('empleados/') }}">Back</a>


</form>