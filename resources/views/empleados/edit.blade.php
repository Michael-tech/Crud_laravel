este es editar

<form action="{{ url('/empleados/'.$empleado->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}

    @include('empleados.form',['Mode'=>'update'])


</form>