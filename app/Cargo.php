<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'cargos';

    protected $fillable = ['nombre'];

    public function empleados(){
        return $this->hasMany(Empleado::class,'cargo_id');
    }
}
