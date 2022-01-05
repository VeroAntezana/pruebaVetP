<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mascota extends Model
{
    protected $fillable =[
        'nombre',
        'color',
        'sexo',
        'fnacimiento',
        'imagen',
        'raza_id',
        'user_id'
    ];

    //relacion uno a muchos raza-mascota (inversa)
    public function raza(){
        return $this->belongsTo('App\Models\raza');
    }

        //relacion uno a muchos user-mascota (inversa)
        public function user(){
            return $this->belongsTo('App\Models\User');
        }

        //relacion uno a muchos mascota-tratamiento
        public function tratamientos(){
            return $this->hasMany('App\Models\tratamiento');
        }

        //relacion uno a muchos mascota-reserva
        public function reservas(){
            return $this->hasMany('App\Models\reserva');
        }
        
    use HasFactory;
}
