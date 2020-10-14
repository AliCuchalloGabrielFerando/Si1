<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Autor extends Model
{
    protected $table = 'detalle__autors';

    protected $fillable = ['libro_id','autor_id'];

    public function libro()
    {
        return $this->belongsTo(Libro::class, 'libro_id');
    }

    public function autor()
    {
        return $this->belongsTo(Autor::class, 'autor_id');
    }
}
