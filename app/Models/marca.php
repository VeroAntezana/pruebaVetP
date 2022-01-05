<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marca extends Model{

    protected $fillable =[
        'nombre',
        'descripcion'
    ];
    use HasFactory;

                //relacion uno a muchos presentacion-producto
                public function productos(){
                    return $this->hasMany('App\Models\Producto');
                }


}
