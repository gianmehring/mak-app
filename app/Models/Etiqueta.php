<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    use HasFactory;
    #claves fuera de la tabla
    #relación N:M con articulos
    public function articulos(){
        return $this->belongsToMany(Articulo::class, 'articulo_etiqueta')->withTimestamps();
    }
}
