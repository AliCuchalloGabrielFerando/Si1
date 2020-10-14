<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividades';
    
    protected $fillable = ['monto','venta_id','compra_id'];

    public function venta(){
        return $this->belongsTo(Venta::class,'venta_id');
    }
    public function compra(){
        return $this->belongsTo(Compra::class,'compra_id');
    }
}
