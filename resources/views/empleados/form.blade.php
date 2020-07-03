<div class="form-group">
    <label for="first_name" class="control-label"> {{ 'First Name' }} * </label>
    <input type="text" name="first_name" id="first_name" 
        class="form-control {{ $errors->has('first_name')?'is-invalid':'' }} " 
        value="{{ isset($empleado->first_name)?$empleado->first_name:old('first_name')}}">
    {!! $errors->first('first_name', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">

    <label for="last_name"> {{ 'Last Name' }} *</label>
    <input type="text"  name="last_name" id="last_name"
        class="form-control {{ $errors->has('last_name')?'is-invalid':'' }} "
        value="{{ isset($empleado->last_name)?$empleado->last_name:old('last_name')}}">
    {!! $errors->first('last_name', '<div class="invalid-feedback">:message</div>') !!}

</div>

<div class="form-group">

    <label for="email" class="control-label"> {{ 'Email' }} *</label>
    <input type="email" name="email" id="email"
        class="form-control {{ $errors->has('email')?'is-invalid':'' }} " 
        value="{{ isset($empleado->email)?$empleado->email:old('email') }}">
    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}

</div>

<div class="form-group">

    <label for="photo" class="control-label"> {{ 'Photography' }} *</label> 
    @if(isset( $empleado->photo ))
        <br>
        <img src="{{ asset('storage').'/'. $empleado->photo }}" alt="" width="100" class=" img-fluid">
        <br> 
    @endif
    <input type="file"  name="photo" id="photo" class="form-control {{ $errors->has('photo')?'is-invalid':'' }}">
    {!! $errors->first('photo', '<div class="invalid-feedback">:message</div>') !!}
    <br>

</div>

<input type="submit" class="btn btn-success" value="{{ $Mode=='create' ? 'Create': 'Update'}}">
<a href="{{ url('empleados/') }}" class="btn btn-primary"> Return</a>
