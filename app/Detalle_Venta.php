<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Venta extends Model
{
    protected $table = 'detalle_venta';

    protected $fillable = ['cantidad','precio','precio_unitario','venta_id',
                            'libro_id'];
    
    public function venta(){
        return $this->belongsTo(Venta::class,'venta_id');
    }
    public function libro(){
        return $this->belongsTo(Libro::class,'libro_id');
    }
}
