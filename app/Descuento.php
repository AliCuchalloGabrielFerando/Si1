<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    protected $table = 'descuentos';

    protected $fillable = ['nombre','porcentaje_descuento'];

    public function ventas(){
        return $this->hasMany(Venta::class,'oferta_id');
    }
}
