<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class especie extends Model
{

    protected $fillable =[
        'nombre'];
    use HasFactory;

    //relacion uno a muchos especie-raza
    public function razas(){
        return $this->hasMany('App\Models\raza');
    }
}
