<?php

namespace App\Http\Controllers;

use App\Empleados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['empleados'] = Empleados::paginate(5);


        return view('empleados.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields=[
          'first_name' => 'required|string|max:100',
          'last_name' => 'required|string|max:100',
          'email' => 'required|email',
          'photo' => 'required|max:10000|mimes:jpeg,png,jpg'
        
        ];
        $Message=["required"=>'The :attribute is requiered'];

        $this->validate($request, $fields, $Message);

        $dataEmpleado = request()->except('_token');

        if ($request->hasFile('photo')) {
            $dataEmpleado['photo'] = $request->file('photo')->store('uploads', 'public');
        }

        Empleados::insert($dataEmpleado);

        return redirect('empleados')->with('Message', 'Employee successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $empleado = Empleados::findOrFail($id);
        return view('empleados.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $fields=[
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email',
          
          ];

          if($request->hasfile('photo')){
            
            $fields+=['photo' => 'required|max:10000|mimes:jpeg,png,jpg'];
          }

          $Message=["required"=>'The :attribute is requiered'];
  
          $this->validate($request, $fields, $Message);

        $dataEmpleado = request()->except(['_token', '_method']);

        if($request->hasFile('photo')) {

            $empleado = Empleados::findOrFail($id);

            Storage::delete('public/' . $empleado->photo);

            $dataEmpleado['photo'] = $request->file('photo')->store('uploads', 'public');
        }

        Empleados::where('id', '=', $id)->update($dataEmpleado);


        return redirect('empleados')->with('Message', 'Employee successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $empleado = Empleados::findOrFail($id);

        if (Storage::delete('public/' . $empleado->photo)) {
            Empleados::destroy($id);
        }

        return redirect('empleados')->with('Message', 'Employee successfully removed');
    }
}
