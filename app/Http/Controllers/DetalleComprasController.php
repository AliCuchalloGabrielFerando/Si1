<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compra;
use App\Libro;
use App\Detalle_Compra;

class DetalleComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($compra_id)
    {
        $compra = Compra::findOrFail($compra_id);
        $libros = Libro::all();
        return view('compra/detalle/create',['compra'=>$compra,'libros'=>$libros]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$compra_id)
    {
        $detalleCompra = new Detalle_Compra();
        $detalleCompra->cantidad = $request->input('cantidad');
        $detalleCompra->precio_unitario = $request->input('precio_unitario');
        $detalleCompra->precio = $detalleCompra->cantidad * $detalleCompra->precio_unitario;
        $detalleCompra->compra_id = $compra_id;

        $libro_titulo = explode('   Edición',$request->input('libro_nombre'));
        $libro_titulo = $libro_titulo[0];
        $libro = Libro::where('titulo',$libro_titulo)->get();
        if(sizeof($libro) == 0 ){
        return redirect()->route('libros.create');
        }
        $libro = $libro[0];
        $libro->stock = $libro->stock + $detalleCompra->cantidad;
        $libro->save();

        $detalleCompra->libro_id = $libro->id;
        $detalleCompra->save();

        $compra = Compra::findOrFail($compra_id);
        $compra->monto_total = $compra->monto_total + $detalleCompra->precio;
        $compra->save();

        return redirect()->route('compras.show',$compra->id);
    }

   

 
  
    public function destroy($id,$compra_id)
    {
      $detalleCompra = Detalle_Compra::findOrFail($id);
      
      $libro = $detalleCompra->libro;
      $libro->stock = $libro->stock -$detalleCompra->cantidad;
      $libro->save();

      $compra = $detalleCompra->compra;
      $compra->monto_total = $compra->monto_total -$detalleCompra->precio;
      $compra->save();

      $detalleCompra->delete();

      return redirect()->route('compras.show',[$compra_id]);
    }
}
