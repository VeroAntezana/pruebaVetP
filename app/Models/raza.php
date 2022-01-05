<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class raza extends Model
{
    protected $fillable =[
        'nombre',
        'descripcion',
        'especie_id'
    ];
        
    use HasFactory;
    //relacion uno a muchos especie-raza (inversa)
    public function especie(){
        return $this->belongsTo('App\Models\especie');
    }

    //relacion uno a muchos raza-mascota
    public function mascotas(){
        return $this->hasMany('App\Models\mascota');
    }
}
