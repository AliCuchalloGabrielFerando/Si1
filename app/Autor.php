<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $table = 'autores';

    protected $fillable = ['nombre_completo'];

    public function detalle_autor(){
        return $this->hasMany(Detalle_Autor::class,'autor_id');
    }
}
