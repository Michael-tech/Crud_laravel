@extends('layouts.app')

@section('content')

<div class="container">



    <form action="{{ url('/empleados') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
        @csrf

        @include('empleados.form',['Mode'=>'create'])

    </form>
</div>
@endsection