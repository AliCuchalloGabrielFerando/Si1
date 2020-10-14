<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use App\User;
use App\Http\Requests\UsuarioRequest;
use App\Http\Requests\ContraseñaRequest;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::paginate(6);
        return view('usuario.index',['usuarios'=>$usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleados = Empleado::all();
        return view('usuario.create',['empleados'=>$empleados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {
        $usuario = new User();
        $usuario->email = $request->input('correo');
        $usuario->password = bcrypt($request->input('password'));
        $usuario->empleado_id = $request->input('empleado_id');
        $usuario->save();
        return redirect()->route('usuarios.index');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleados = Empleado::all();
        $usuario = User::findOrFail($id);
        return view('usuario.edit',['usuario'=>$usuario,'empleados'=>$empleados]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->email = $request->input('correo');
        $usuario->empleado_id = $request->input('empleado_id');
        $usuario->save();
        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id)->delete();
        return redirect()->route('usuarios.index');
    }

    public function perfil($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuario.perfil.cambiarContraseña',['usuario'=>$usuario]);
    }

    public function cambiarContraseña(ContraseñaRequest $request,$id)
    {
        $usuario = User::findOrFail($id);
        $usuario->password = bcrypt($request->input('password'));
        $usuario->save();
        return redirect()->route('home');
    }
}
