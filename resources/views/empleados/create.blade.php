Create

<form action="{{ url('/empleados') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="name"> {{ 'First Name' }}</label>
    <input type="text" name="first_name" id="name" value="">
    <br>
    <label for="last_name"> {{ 'Last Name' }}</label>
    <input type="text" name="last_name" id="last_name" value="">
    <br>

    <label for="email"> {{ 'Email' }}</label>
    <input type="email" name="email" id="email">
    <br>

    <label for="photo"> {{ 'Photography' }}</label>
    <input type="file" name="photo" id="photo">


    <input type="submit" value="Agregar">

</form>