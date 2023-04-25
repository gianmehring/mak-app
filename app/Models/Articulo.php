<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;
    
    protected $fillable = ['nombre', 'slug', 'descripcion', 'cantidad', 'status'];
    #claves dentro de la tabla
    #relación 1:1 inversa con admins
    public function admin(){
        return $this->belongsTo(Admin::class); 
    }
    
    #claves fuera de la tabla
    #relación N:M inversa con etiquetas
    public function etiquetas(){
        return $this->belongsToMany(Etiqueta::class, 'articulo_etiqueta')->withTimestamps(); 
    }

    #relación polimórfica
    public function articuloable(){
        return $this->morphTo();
    }
}
