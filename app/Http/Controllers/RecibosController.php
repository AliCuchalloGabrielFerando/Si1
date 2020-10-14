<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recibo;
use App\Venta;
use App\Compra;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class RecibosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recibos = Recibo::paginate(6);
         return view('recibo.index',['recibos'=>$recibos]);
    }

    public function reporte()
    {
        $ventas = Venta::all();
        $suma = Recibo::sum('monto');
        $suma_venta = Venta::sum('monto_total');
        $suma_descuento = Venta::sum('monto_descuento');
        return view('venta.reporte.index',['ventas'=>$ventas,'total'=>$suma,'total_venta'=>$suma_venta,'descuento'=>$suma_descuento]);
    }

    public function buscarReporte(Request $request)
    {
        $fecha = $request->input('texto');
        $ventas = Venta::whereDate('created_at',$fecha)->get();
        $suma = Recibo::whereDate('created_at',$fecha)->get()->sum('monto');
        $suma_venta = Venta::whereDate('created_at',$fecha)->get()->sum('monto_total');
        $suma_descuento = Venta::whereDate('created_at',$fecha)->get()->sum('monto_descuento');
        return view('venta.reporte.index',['ventas'=>$ventas,'total'=>$suma,'total_venta'=>$suma_venta,'descuento'=>$suma_descuento]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $venta_id)
    {
        $venta = Venta::findOrFail($venta_id);
        if($venta->recibo_id > 0){
            return back();
        }
        $recibo = new Recibo();
        $recibo->monto = $venta->monto_total;
        $recibo->save(); 
        $venta->recibo_id = $recibo->id;
        $venta->save();

        $pdf = \PDF::loadView('recibo.Recibo',['venta'=>$venta]);
        return $pdf->download('Recibo.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recibo = Recibo::findOrFail($id);
        $venta_id = $recibo->venta->id;
        return redirect()->route('ventas.show',[$venta_id]);
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
        $recibo = Recibo::findOrFail($id);
        $venta_id = $recibo->venta->id;
        $venta = Venta::findOrFail($venta_id);
        foreach ($venta->detalle_ventas as $detalle)
        {
            $libro = $detalle->libro;
            $libro->stock = $libro->stock + $detalle->cantidad;
            $libro->save();
           $detalle->delete();
        }
        $recibo->delete();
        return back();
    }

    public function sumTotalVentas()
    {
        $suma_total_venta = Venta::sum('monto_total');
        $suma_total_compras = Compra::sum('monto_total');
        return view('actividad.grafico',['ventas'=>$suma_total_venta,'compras'=>$suma_total_compras]);
    }
}
