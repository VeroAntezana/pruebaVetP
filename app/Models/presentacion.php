<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class presentacion extends Model
{
    use HasFactory;
    protected $fillable =[
        'nombre',
        'descripcion'];

            //relacion uno a muchos presentacion-producto
            public function productos(){
                return $this->hasMany('App\Models\Producto');
            }
}
