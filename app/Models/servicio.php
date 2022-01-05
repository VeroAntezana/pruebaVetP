<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicio extends Model{
    use HasFactory;

    protected $fillable =[
        'nombre', 'descripcion','imagen'];

        //relacion uno a muchos reserva-servicio
        public function reservas(){
            return $this->hasMany('App\Models\reserva');
        }

        //relacion muchos a muchos servicio - visita
        public function visitas(){
            return $this->belongsToMany('App\Models\visita');
        }
}
