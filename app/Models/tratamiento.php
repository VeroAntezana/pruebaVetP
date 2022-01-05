<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tratamiento extends Model
{
    protected $fillable =[
        'diagnostico',
        'finicio',
        'ffin',
        'precio',
        'mascota_id'
    ];

        //relacion uno a muchos mascota - tratamiento (inversa)
        public function mascota(){
            return $this->belongsTo('App\Models\mascota');
        }

        //relacion uno a muchos user-visita
        public function visitas(){
            return $this->hasMany('App\Models\visita');
        }

    use HasFactory;
}
