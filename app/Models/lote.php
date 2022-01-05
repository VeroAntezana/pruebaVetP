<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lote extends Model{
    use HasFactory;
    protected $fillable =[
        'fcompra',
        'felaboracion',
        'fexpiracion',
        'stock',
        'producto_id'
    ];


        //relacion uno a muchos categoria-producto (inversa)
        public function producto(){
            return $this->belongsTo('App\Models\producto');
        }
    }
