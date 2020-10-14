<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    protected $table = 'temas';
    
    protected $fillable = ['nombre','descripcion'];

    public function libro(){
        return $this->hasMany(Libro::class,'categoria_id');
    }
}
