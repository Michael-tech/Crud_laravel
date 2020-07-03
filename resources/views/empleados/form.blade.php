<div class="form-group">
    <label for="first_name" class="control-label"> {{ 'First Name' }}</label>
    <input type="text" class="form-control" name="first_name" id="first_name" value="{{ isset($empleado->first_name)?$empleado->first_name:'' }}">
</div>

<div class="form-group">

    <label for="last_name"> {{ 'Last Name' }}</label>
    <input type="text"  class="form-control" name="last_name" id="last_name" value="{{ isset($empleado->last_name)?$empleado->last_name:'' }}">

</div>

<div class="form-group">

    <label for="email" class="control-label"> {{ 'Email' }}</label>
    <input type="email" class="form-control" name="email" id="email" value="{{ isset($empleado->email)?$empleado->email:'' }}">

</div>

<div class="form-group">

    <label for="photo" class="control-label"> {{ 'Photography' }}</label>
        @if(isset( $empleado->photo ))
        <br>
        <img src="{{ asset('storage').'/'. $empleado->photo }}" alt="" width="100" class=" img-fluid">
        <br>
        
        @endif
    <input type="file"  class="form-control" name="photo" id="photo">
    <br>

</div>

<input type="submit" class="btn btn-success" value="{{ $Mode=='create' ? 'Create': 'Update'}}">
<a href="{{ url('empleados/') }}" class="btn btn-primary"> Return</a>