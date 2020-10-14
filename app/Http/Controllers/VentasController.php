<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venta;
use App\Cliente;
use App\Descuento;
use Carbon\Carbon;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Venta::paginate(6);
        return view('venta.index',['ventas'=>$ventas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        $descuentos = Descuento::all();
        return view('venta.create',['clientes'=>$clientes,'descuentos'=>$descuentos]);
    }
    public function buscarCliente (Request $request)
    {
        if($request->input('opcion')==1){
            $nombre=$request->input('texto');
            $cliente=Cliente::where('carnet_identidad','like',"$nombre%")->get();
          }
          if($request->input('opcion')==2){
            $nombre=$request->input('texto');
            $cliente=Cliente::where('apellido_paterno','like',"$nombre%")->get();
          }
        return view('venta.create',['clientes'=>$cliente]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $venta = new Venta();
        $venta->cliente_id = $request->input('cliente_id');
        $venta->empleado_id = auth()->user()->empleado->id;
        $venta->oferta_id = $request->input('descuento_id');
        $venta->save();
       return redirect()->route('ventas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venta = Venta::findOrFail($id);
        return view('venta.show',['venta'=>$venta]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $venta = Venta::findOrFail($id);
        $clientes = Cliente::all();
        return view('venta.edit',['venta'=>$venta,'clientes'=>$clientes]);
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
        $venta = Venta::findOrFail($id);
        $venta->cliente_id = $request->input('cliente_id');
        $venta->save();
       return redirect()->route('ventas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venta=Venta::findOrFail($id);
        if($venta->recibo_id > 0){
            return back();
        }
        foreach ($venta->detalle_ventas as $detalle)
        {
            $libro = $detalle->libro;
            $libro->stock = $libro->stock + $detalle->cantidad;
            $libro->save();
           $detalle->delete();
        }
        $venta->delete();
        return redirect()->route('ventas.index');
    }
}
