<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Compra extends Model
{
    protected $table = 'detalle_compra';

    protected $fillable = ['cantidad','precio','precio_unitario','compra_id','libro_id'];
    
    public function compra(){
        return $this->belongsTo(Compra::class,'compra_id');
    }
    public function libro(){
        return $this->belongsTo(Libro::class,'libro_id');
    }
}
