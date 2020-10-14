<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Libro extends Model
{
    protected $table = 'libros';

    protected $fillable = ['titulo','precio','edicion','edicion_año',
                            'editorial_id','categoria_id','stock'];
    
    public function editorial(){
        return $this->belongsTo(Editorial::class,'editorial_id');
    }
    public function categoria()
    {
        return $this->belongsTo(Tema::class, 'categoria_id');
    }
    public function detalle_autores()
    {
        return $this->hasMany(Detalle_Autor::class, 'libro_id');
    }

}
