<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';

    protected $fillable = ['monto_total','monto_descuento','monto_venta',
                            'oferta_id','cliente_id','empleado_id','recibo_id'];
    public function cliente(){
        return $this->belongsTo(Cliente::class,'cliente_id');
    }
    public function oferta(){
        return $this->belongsTo(Descuento::class,'oferta_id');
    }
    public function empleado(){
        return $this->belongsTo(Empleado::class,'empleado_id');
    }
    public function actividad(){
        return $this->hasOne(Actividad::class,'venta_id');
    }
    public function detalle_ventas(){
        return $this->hasMany(Detalle_Venta::class,'venta_id');
    }
    public function recibo(){
        return $this->belongsTo(Recibo::class,'recibo_id');
    }
}
