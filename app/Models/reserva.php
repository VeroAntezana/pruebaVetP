<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reserva extends Model
{
    protected $fillable =[
        'fecha',
        'mascota_id',
        'servicio_id'
    ];

        //relacion uno a muchos reserva-servicio (inversa)
        public function servicio(){
            return $this->belongsTo('App\Models\servicio');
        }

         //relacion uno a muchos mascota - reserva (inversa)
         public function mascota(){
            return $this->belongsTo('App\Models\mascota');
        }
    use HasFactory;
}
