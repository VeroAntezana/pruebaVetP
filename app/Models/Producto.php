<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable =[
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'categoria_id',
        'presentacion_id',
        'marca_id'
    ];

    //relacion uno a muchos categoria-producto (inversa)
    public function categoria(){
        return $this->belongsTo('App\Models\categoria');
    }

        //relacion uno a muchos presentacion-producto (inversa)
        public function presentacion(){
            return $this->belongsTo('App\Models\presentacion');
        }

        

        //relacion uno a muchos lote-producto
        public function lotes(){
            return $this->hasMany('App\Models\lote');
        }


        //relacion uno a muchos marca-producto (inversa)
        public function marca(){
         return $this->belongsTo('App\Models\marca');
        }
}
