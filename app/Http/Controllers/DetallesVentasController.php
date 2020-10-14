<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detalle_Venta;
use App\Libro;
use App\Venta;
use App\Descuento;
use App\Tema;

class DetallesVentasController extends Controller
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
    public function create($venta_id)
    {
        $venta = Venta::findOrFail($venta_id);
        $libros = Libro::where('stock','>',0)->get();
        return view('venta.detalle.create',['venta'=>$venta,'libros'=>$libros]);
    }

    public function buscarLibro(Request $request, $id){
        $nombre=$request->input('texto');
        if($request->input('opcion')==1){
            $libros=Libro::where('titulo','like',"$nombre%")
                           ->where('stock','>',0)->get();
          }
          if($request->input('opcion')==2){
            $libros = Libro::join('detalle__autors','libros.id','=','detalle__autors.libro_id')
                          ->join('autores','detalle__autors.autor_id','=','autores.id')
                          ->where('autores.nombre_completo','like',"$nombre%")
                          ->where('stock','>',0)
                          ->get();
          }
          if($request->input('opcion')==3){
            $libros=Libro::join('temas','libros.categoria_id','=','temas.id')
                           ->where('temas.nombre','like',"$nombre%")
                           ->where('stock','>',0)
                           ->get();
          }
        $venta = Venta::findOrFail($id);
        return view('venta.detalle.create',['venta'=>$venta,'libros'=>$libros]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request, $id)
    {
        $libro = Libro::findOrFail( $request->input('libro_id'));
        $cantidad = $request->input('cantidad');
       
        $detalle = new Detalle_Venta();
        $detalle->venta_id = $id;
        $detalle->libro_id = $libro->id;
        $detalle->cantidad = $cantidad;
        $detalle->precio_unitario = $libro->precio;
        $detalle->precio = $cantidad*$libro->precio;
        $detalle->save();

        $venta = Venta::findOrFail($id);
        
        $descuento = Descuento::where('id',$venta->oferta_id)->get();
        if(sizeof($descuento)==0){
            $venta->monto_venta = $venta->monto_venta+$detalle->precio;
            $venta->monto_total = $venta->monto_venta-$venta->monto_descuento;
        }else{
            $descuento = $descuento[0];
            $venta->monto_venta = $venta->monto_venta + $detalle->precio;
            $venta->monto_descuento = $venta->monto_venta - ($venta->monto_venta * $descuento->porcentaje_descuento);
            $venta->monto_total = $venta->monto_venta - $venta->monto_descuento;
        }
       
        $venta->save();

        $libro->stock = $libro->stock - $cantidad;
        $libro->save();

        return redirect()->route('ventas.show',[$id]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detalle = Detalle_Venta::findOrFail($id);
        $venta = Venta::findOrFail($detalle->venta_id);
        if($venta->recibo_id >0){
            return back();
        }
        $venta->monto_venta = $venta->monto_venta-$detalle->precio;
        $venta->monto_total = $venta->monto_venta-$venta->monto_descuento;
        $venta->save();

        $libro = Libro::findOrFail($detalle->libro_id);
        $libro->stock =$libro->stock + $detalle->cantidad;
        $libro->save();

        $detalle->delete();
        return back();
    }
}
