<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';

    protected $fillable = ['nombre','telefono','estado_id'];

    public function estado(){
        return $this->belongsTo(Estado::class,'estado_id');
    }
    public function compras(){
        return $this->hasMany(Compra::class,'proveedor_id');
    }
}
