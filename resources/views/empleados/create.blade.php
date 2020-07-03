Create

<form action="{{ url('/empleados') }}" method="post" enctype="multipart/form-data">
    @csrf
    
    @include('empleados.form',['Mode'=>'create'])

</form>