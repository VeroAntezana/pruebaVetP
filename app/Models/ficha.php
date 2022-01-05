<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ficha extends Model
{
    protected $fillable =[
        'fecha',
        'periodo_id',
        'reserva_id'
    ];
    use HasFactory;
}
