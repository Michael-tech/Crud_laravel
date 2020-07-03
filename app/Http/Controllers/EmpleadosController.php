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
        $dataEmpleado = request()->except('_token');

        if ($request->hasFile('photo')) {
            $dataEmpleado['photo'] = $request->file('photo')->store('uploads', 'public');
        }

        Empleados::insert($dataEmpleado);

        return redirect('empleados');
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
        //
        $dataEmpleado = request()->except(['_token', '_method']);

        if ($request->hasFile('photo')) {

            $empleado = Empleados::findOrFail($id);

            Storage::delete('public/' . $empleado->photo);

            $dataEmpleado['photo'] = $request->file('photo')->store('uploads', 'public');
        }

        Empleados::where('id', '=', $id)->update($dataEmpleado);

        $empleado = Empleados::findOrFail($id);
        return view('empleados.edit', compact('empleado'));
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


        return redirect('empleados');
    }
}
