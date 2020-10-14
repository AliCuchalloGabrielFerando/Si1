<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use App\Cargo;
use App\Estado;
use App\Http\Requests\EmpleadoRequest;
class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados= Empleado::paginate(6);
        return view('empleado.index',['empleados'=>$empleados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargos=Cargo::all();
        $estados= Estado::all();
        return view('empleado.create',['cargos'=>$cargos, 'estados'=>$estados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpleadoRequest $request)
    {
        $empleado= new Empleado();
        $empleado->carnet_identidad= $request->input('carnet_identidad');
        $empleado->nombre= $request->input('nombre');
        $empleado->apellido_paterno= $request->input('apellido_paterno');
        $empleado->apellido_materno= $request->input('apellido_materno');
        $empleado->telefono= $request->input('telefono');
        $empleado->cargo_id= $request->input('cargo_id');
        $empleado->estado_id= $request->input('estado_id');
        $empleado->save();
        return redirect()->route('empleados.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function buscar(Request $request){
        $dato=$request->input('nombre');
        $empleados = Empleado::where('nombre','like',"$dato%")
                     ->orWhere('apellido_paterno','like',"$dato%")
                     ->orWhere('apellido_materno','like',"$dato%")
                     ->orWhere('carnet_identidad','like',"$dato%")->get();
        return view('empleado.index',['empleados'=>$empleados]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado= Empleado::findOrFail($id);
        $cargos=Cargo::all();
        $estados= Estado::all();
        return view('empleado.edit',['empleado'=>$empleado, 'cargos'=>$cargos, 'estados'=>$estados]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpleadoRequest $request, $id)
    {
        $empleado= Empleado::findOrFail($id);
        $empleado->nombre= $request->input('nombre');
        $empleado->apellido_paterno= $request->input('apellido_paterno');
        $empleado->apellido_materno= $request->input('apellido_materno');
        $empleado->telefono= $request->input('telefono');
        $empleado->cargo_id= $request->input('cargo_id');
        $empleado->estado_id= $request->input('estado_id');
        $empleado->save();
        return redirect()->route('empleados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
