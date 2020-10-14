<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
    protected $table = 'editoriales';

    protected $fillable = ['nombre'];
    
    public function libros(){
        return $this->hasMany(Libro::class,'editorial_id');
    }
}
