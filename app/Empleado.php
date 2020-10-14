<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';
    
    protected $fillable = ['carnet_identidad', 'nombre','apellido_paterno','apellido_materno','telefono'
                            ,'cargo_id','estado_id'];

    public function cargo(){
        return $this->belongsTo(Cargo::class,'cargo_id');
    }
    public function estado(){
        return $this->belongsTo(Estado::class,'estado_id');
    }
    public function ventas(){
        return $this->hasMany(Venta::class,'empleado_id');
    }
    public function compras(){
        return $this->hasMany(Compra::class,'empleado_id');
    }
    public function usuario(){
        return $this->hasOne(Usuario::class,'empleado_id');
    }
}
