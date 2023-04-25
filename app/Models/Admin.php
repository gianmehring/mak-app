<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    #claves fuera de la tabla
    #relación 1:N con accesorios
    public function accesorios(){
        return $this->hasMany(Accesorio::class); //esto hace lo mismo que esto => $admin = Admin::where('user_id', $this->id)->first();
    }
    
    #relación 1:N con bijouteries
    public function bijouteries(){
        return $this->hasMany(Bijouterie::class); //esto hace lo mismo que esto => $admin = Admin::where('user_id', $this->id)->first();
    }
    
    #relación 1:N con lencerias
    public function lencerias(){
        return $this->hasMany(Lenceria::class); //esto hace lo mismo que esto => $admin = Admin::where('user_id', $this->id)->first();
    }
    
    #claves dentro de la tabla
    #relación 1:1 inversa con users
    public function user(){
        return $this->belongsTo(User::class); //esto hace lo mismo que esto => $user = User::find($this->user_id);
    }
}
