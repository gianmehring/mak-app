<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accesorio extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['accesorio', 'alto', 'largo', 'profundidad'];

    #relación 1:1 polimórfica
    public function articulo(){
        return $this->morphOne(Articulo::class, 'articuloable');
    }

    #relación 1:1 polimórfica
    public function foto(){
        return $this->morphOne(Foto::class, 'fotoable');
    }
}
