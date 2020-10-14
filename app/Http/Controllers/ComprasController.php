<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompraRequest;
use App\Compra;
use App\Detalle_Compra;
use App\Empleado;
use App\Proveedor;
Use Carbon\Carbon;
Use App\User;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = Compra::paginate(6);
        return view('compra.index',['compras'=>$compras]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores = Proveedor::where('estado_id',1)->get();
        return view('compra.create',['proveedores'=>$proveedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompraRequest $request)
    {
       $compra = new Compra();
       $proveedor = Proveedor::where('nombre',$request->input('proveedor_nombre'))->get();
       if(sizeof($proveedor)== 0 ){
       return redirect()->route('proveedores.create');
       }
       $proveedor = $proveedor[0];
       $compra->monto_total = 0;
       $compra->fecha = Carbon::now('America/La_Paz');
       $compra->proveedor_id = $proveedor->id;
       $compra->empleado_id = auth()->user()->empleado_id;
       $compra->save();

       return redirect()->route('compras.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $compra = Compra::findOrFail($id);
        $compra->load('detallecompra');
        $compra->detallecompra->load('libro');
        return view('compra.show',['compra'=>$compra]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $compra = Compra::findOrFail($id);
        $proveedores = Provedores::all();
        $empleados = Empleados::all();
        return view('compra.edit',['compra'=>$compra,'proveedores'=>$proveedores,'empleados'=>$empleados]);
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
        $compra = Compra::findOrFail($id);
        $compra->fecha = $request->input('fecha');
        $compra->proveedor_id = $request->input('proveedor_id');
        $compra->empleado_id = $request->input('empleado_id');
        $compra->save();
 
        return redirect()->route('compras.show',['id'=>$compra->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $compra = Compra::findOrFail($id);
        $compra->load('detallecompra');
        foreach ($compra->detallecompra as $detalle) {
            $libro = $detalle->libro;
            $libro->stock = $libro->stock - $detalle->cantidad;
            $libro->save();

            $detalle->delete();
        }
        $compra->delete();

        return redirect()->route('compras.index');
    }
}
