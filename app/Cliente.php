<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = ['carnet_identidad','nombre','apellido_paterno','apellido_materno','telefono'];

    public function ventas(){
        return $this->hasMany(Venta::class,'cliente_id');
    }
}
