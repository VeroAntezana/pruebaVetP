<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    use HasFactory;
    protected $fillable =[
        'nombre',
        'descripcion'];

        //relacion uno a muchos categoria-producto
        public function productos(){
            return $this->hasMany('App\Models\Producto');
        }
        
}
