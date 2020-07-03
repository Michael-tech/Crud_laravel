{{ $Mode=='create' ? 'Add Employee': 'Adit Employee'}}

<label for="first_name"> {{ 'First Name' }}</label>
<input type="text" name="first_name" id="first_name" value="{{ isset($empleado->first_name)?$empleado->first_name:'' }}">
<br>
<label for="last_name"> {{ 'Last Name' }}</label>
<input type="text" name="last_name" id="last_name" value="{{ isset($empleado->last_name)?$empleado->last_name:'' }}">
<br>

<label for="email"> {{ 'Email' }}</label>
<input type="email" name="email" id="email" value="{{ isset($empleado->email)?$empleado->email:'' }}">
<br>

<label for="photo"> {{ 'Photography' }}</label>
@if(isset( $empleado->photo ))
<br>
<img src="{{ asset('storage').'/'. $empleado->photo }}" alt="" width="200">
<br>
@endif
<input type="file" name="photo" id="photo">
<br>

<input type="submit" value="{{ $Mode=='create' ? 'Create': 'Update'}}">
<a href="{{ url('empleados/') }}">Back</a>