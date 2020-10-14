<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Http\Requests\ClienteRequest;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes=Cliente::paginate(6);
        return view('cliente.index',['clientes'=>$clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
        $cliente=new Cliente();
        $cliente->carnet_identidad=$request->input('carnet_identidad');
        $cliente->nombre=$request->input('nombre');
        $cliente->apellido_paterno=$request->input('apellido_paterno');
        $cliente->apellido_materno=$request->input('apellido_materno');
        $cliente->save();
        return redirect()->route('clientes.index');
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
        $cliente=Cliente::findOrFail($id);
        return view('cliente.edit',['cliente'=>$cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteRequest $request, $id)
    {
        $cliente=Cliente::findOrFail($id);
        $cliente->carnet_identidad=$request->input('carnet_identidad');
        $cliente->nombre=$request->input('nombre');
        $cliente->apellido_paterno=$request->input('apellido_paterno');
        $cliente->apellido_materno=$request->input('apellido_materno');
        $cliente->save();
        
        return redirect()->route('clientes.index');
    }
    public function buscar(Request $request)
    {
        if($request->input('opcion')==1){
            $nombre=$request->input('texto');
            $cliente=Cliente::where('carnet_identidad','like',"$nombre%")->get();
          }
          if($request->input('opcion')==2){
            $nombre=$request->input('texto');
            $cliente=Cliente::where('apellido_paterno','like',"$nombre%")->get();
          }
        return view('cliente.index',['clientes'=>$cliente]);
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
