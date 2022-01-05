<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visita extends Model
{
    use HasFactory;
    protected $fillable =[
        'descripcion',
        'detalle',
        'fecha',
        'hora',
        'user_id',
        'tratamiento_id'

    
    ];


    
        //relacion uno a muchos user-visita (inversa)
        public function user(){
            return $this->belongsTo('App\Models\User');
        }

        //relacion uno a muchos tratamiento-visita (inversa)
        public function tratamiento(){
            return $this->belongsTo('App\Models\tratamiento');
        }

        //relacion muchos a muchos servicio - visita
        public function servicios(){
            return $this->belongsToMany('App\Models\servicio');
        }
}
