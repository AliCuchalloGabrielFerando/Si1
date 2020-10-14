<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
    protected $table = 'recibos';
    protected $fillable = ['monto'];

    public function venta(){
        return $this->hasOne(Venta::class, 'recibo_id');
    }


}
