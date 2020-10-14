<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'compras';

    protected $fillable = ['fecha','monto_total','proveedor_id','empleado_id'];

    public function proveedor(){
        return $this->belongsTo(Proveedor::class,'proveedor_id');
    }
    public function empleado(){
        return $this->belongsTo(Empleado::class,'empleado_id');
    }
    public function actividad(){
        return $this->hasOne(Actividad::class,'compra_id');
    }
    public function detallecompra(){
        return $this->hasMany(Detalle_Compra::class,'compra_id');
    }
}
