<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados';

    protected $fillable = ['nombre'];

    public function empleados(){
        return $this->hasMany(Empleado::class,'estado_id');
    }
    public function proveedores(){
        return $this->hasMany(Proveedor::class,'estado_id');
    }
}

